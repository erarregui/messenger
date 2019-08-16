<template>
	<b-container fluid style="height: calc(100vh - 56px);">
	    <b-row class="h-100" no-gutters>
	        <b-col cols="4">
	            <contact-list-component v-on:conversationSelected="changeActiveConversation($event)"></contact-list-component>
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
                messages: []
                
            };
        },
        mounted() {

            Echo.channel(`user.${this.userId}`)
                .listen('MessageSent', (data) => {
                    console.log(message);
                    const message = data.message;
                    message.written_by_me = false;  
                    this.addMessage(message);
                
        });
            console.log('Component mounted.')
            //alert('Component mounted')
        },
        methods: {
        	changeActiveConversation(conversation) {
        		console.log('nueva conversacion seleccionada', conversation);
                this.selectedConversation = conversation;
                this.getMessages();
        	},

            getMessages() {
                axios.get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`) //solicitamos datos a la url con envio de parametros
                .then((response) => {  //una ves que tenemos la respuesta
                 //console.log(response.data);
                 this.messages = response.data;
             });
            },
            addMessage(message) {
               if (this.selectedConversation.contact_id == message.from_id) { 
                   this.messages.push(message);
               }     
            }  
        }
    }
</script>