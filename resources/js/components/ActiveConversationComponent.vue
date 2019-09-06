<template>
	<b-row class="h-100">
		<b-col cols="8">
			<b-card no-body
				header-bg-variant="info"
				footer-border-variant="dark"
				title="Conversacion Activa"
				class="h-100">
                
                <b-card-body class="card-body-scroll">
    				<message-conversation-component
        				 v-for="message in messages" 
        				 :key="message.id"
        				 :written-by-me="message.written_by_me"
                         :image="message.written_by_me ? myImage : contactImage"> 
        				
                         {{ message.content}}
    				
                    </message-conversation-component >
                </b-card-body>

				<div slot="footer">
					<b-form class="mb-0" @submit.prevent="postMessage"
					    autocomplete="off">  
						
						<b-input-group>
						<b-form-input calss="text-center "
						type="text"
						v-model="newMessage"
						placeholder="Escribe un mensaje ..">
						</b-form-input>

						<b-input-group-append>
						<b-button type="submit"  variant="primary">Enviar</b-button>
						</b-input-group-append>
						</b-input-group>


					</b-form>
				</div>
			</b-card> 
		</b-col>
        <b-col cols="4" class="p-1">
            <b-img :src="contactImage" v-bind="mainProps" width="60" height="60"  rounded="circle"  alt="Circle image"></b-img>
            <p>{{ contactName }}</p>
            <hr>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<style type="text/css">
    .card-body-scroll {
        max-height: calc(100vh - 63px);
        overflow-y: auto; /*para el scroll automatico*/
    }
</style>

<script>
    export default {
        //propiedades que vienen de forma externa
        //puede ser un array o un objet
        props: {
            contactId: Number, //viene de MessageComponet
            contactName: String,
            myImage: String,
            contactImage: String
        },

        data() {
            return {
            	
            	newMessage: ''//variable para el nuevo mensaje
         
            };
        },
        mounted() {
        	
        },	
        methods: {
        	
        	postMessage() {
        		const params = {
        			to_id: this.contactId,
        			content: this.newMessage
        		};
        		axios.post('/api/messages', params) //solicitamos datos a la url
                .then((response) => {  //una ves que tenemos la respuesta
                 //console.log(response.data);
                 //si el registro es exitoso
                 if (response.data.success) { //si la respuesta es exitosa
	                 this.newMessage = ''; //limipo campo Message
                     const message = response.data.message;
                     message.written_by_me = true;
	                 this.$emit('messageCreated', message);
                 } 
                });
        	}
        },
        computed: { //campo calcualdo
            messages(){
                return this.$store.state.messages;
            }
        },
        updated(){ //cuando se actualizan la variable dispara el
           const el = document.querySelector('.card-body-scroll');
           el.scrollTop = el.scrollHeight;
        }
        //watch: { //metodo para escuchar eventos
        //    contactId(value) {
        //       console.log(`contactId => ${this.contactId}`);
        //        this.getMessages(); //para cargar el contacto seleccionado
        //    }
        //}
    }
</script>