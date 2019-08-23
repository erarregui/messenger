<template>
	<b-container fluid style="height: calc(100vh - 56px);">
	    <b-row class="h-100" no-gutters>
	        <b-col cols="4">
    	        
                <contact-list-component 
                    v-on:conversationSelected="changeActiveConversation($event)"
                    :conversations="conversations">
                    
                </contact-list-component>
	        
            </b-col>
	         <b-col cols="8">
	            
	            <active-conversation-component
                   v-if="selectedConversation"
                   :contact-id="selectedConversation.contact_id"
                   :contact-name="selectedConversation.contact_name"
                   :messages="messages"
                   @messageCreated="addMessage($event)">

                </active-conversation-component>
	         </b-col>
	    </b-row>
	</b-container>
</template>

<script>
    export default {

        props: {
            userId: Number
        },
       
        data() {  //funcion data() devuelve un objeto
            return {
                selectedConversation : null,
                messages: [],
                conversations: []
                
            };
        },
        mounted() {
            this.getConversations();
            Echo.private(`user.${this.userId}`)
                .listen('MessageSent', (data) => {
                    console.log(message);
                    const message = data.message;
                    message.written_by_me = false;  
                    this.addMessage(message);
                
        }); //canales para indicar estado del contacto
            Echo.join(`messenger`)
                .here((users) => { //usuarios presentes
                console.log('online', users);
            })
                .joining((user) => { //usuario que inicia
                console.log('acabo de conectarse', user.id);
                const index = this.conversations.findIndex((conversation) => {
                    return conversation.contact_id == user.id;
                });
                console.log(index);
                
                // vue.$set() para agregar una propiedad a un objeto    
                this.$set(this.conversations[index], 'online', true);

            })
                .leaving((user) => { //usuario que sale
                const index = this.conversations.findIndex((conversation) => {
                    return conversation.contact_id == user.id;
                });
                this.conversations[index].online = false;
                // vue.$set() para agregar una propiedad a un objeto    
                this.$set(this.conversations[index], 'online', false);

            });
        },
        methods: {
        	changeActiveConversation(conversation) {
        		console.log('nueva conversacion seleccionada', conversation);
                this.selectedConversation = conversation;
                this.getMessages();
                this.$bvModal.msgBoxOk('Action completed', {
                  title:'prueba',
                  okVariant:'danger',
          

        })
        	},

            getMessages() {
                axios.get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`) //solicitamos datos a la url con envio de parametros
                .then((response) => {  //una ves que tenemos la respuesta
                 //console.log(response.data);
                 this.messages = response.data;
             });
            },
            addMessage(message) {
               const conversation = this.conversations.find((conversation) => {
                return conversation.contact_id == message.from_id ||
                    conversation.contact_id == message.to_id;
               });

               const author = this.userId === message.from_id ? 'tu' : conversation.contact_name;
               conversation.last_message = `${author}: ${message.content}`;
               conversation.last_time = message.created_at;


               if (this.selectedConversation.contact_id == message.from_id
                   || this.selectedConversation.contact_id == message.to_id)  
                   this.messages.push(message);
            },     
            
            getConversations() {
              axios.get('/api/conversations')
              .then((response) => {
                console.log(response.data);
                //guardamos en conversations[] la data que viene del servidor (response.data)    
                this.conversations = response.data;
              });

            },  
        }
    }
</script>