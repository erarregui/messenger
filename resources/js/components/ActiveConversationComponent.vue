<template>
	<b-row class="h-100">
		<b-col cols="8">
			<b-card
				header-bg-variant="info"
				footer-border-variant="dark"
				title="Conversacion Activa"
				class="h-100">


				<message-conversation-component
				 v-for="message in messages" 
				 :key="message.id"
				 :written-by-me="message.written_by_me"> 
				{{ message.content}}
				</message-conversation-component >


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
            <b-img v-bind="mainProps" blank width="60" height="60"  rounded="circle" blank-color="#777" alt="Circle image"></b-img>
            <p>Usuario seleccionado</p>
            <hr>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>
<script>
    export default {
        data() {
            return {
            	messages: [], //aca se devuelven los mensajes	
            	newMessage: '',//variable para el nuevo mensaje
            	contactId: 2

            };
        },
        mounted() {
        	this.getMessages();
        },	
        methods: {
        	getMessages() {
        		axios.get(`/api/messages?contact_id=${this.contactId}`) //solicitamos datos a la url con envio de parametros
                .then((response) => {  //una ves que tenemos la respuesta
                 //console.log(response.data);
                 this.messages = response.data;
             });
        	},
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
	                 this.getMessages();  //llamo al metodo getMessages
                 } 
                });
                 

        	}
        }
    }
</script>