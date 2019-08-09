<template>
    <div>
        <b-form class="my-3 mx-2">  
            <b-form-input calss="text-center "
                 type="text"
                 placeholder="Buscar contacto ..">
            </b-form-input>
        </b-form>
        <b-list-group>
            <contact-component 
              v-for="conversation in conversations"
              :key="conversation.id"
              :conversation="conversation"
              @click.native="selectConversation(conversation)">
             
            </contact-component>
           <!--Enviar un objeto a un componente hijo :propiedad="valor"--> 
           <!--
           <contact-component variant="dark">
           </contact-component>
           <b-list-group-item variant="">
              <b-row class="p-2" align-h="center">
                        <b-col cols="12" md="3" class="text-center">
                            <b-img v-bind="mainProps" blank width="60" height="60"  rounded="circle" blank-color="#777" alt="Circle image"></b-img>
                        </b-col>
                        <b-col cols="6" align-self="center" class="d-none d-md-block">
                            <p class="mb-1">Juan Ramos</p>
                            <p class="text-muted small mb-1">Tu: Hasta luego</p>
                            
                        </b-col>
                        <b-col cols="3" class="d-none d-md-block">
                            <p class="text-muted small">1:37 pm</p>
                        </b-col>
                    </b-row>
           </b-list-group-item>
           <b-list-group-item variant="secondary">
              <b-row class="p-2" align-h="center">
                        <b-col cols="12" md="3" class="text-center">
                            <b-img v-bind="mainProps" blank width="60" height="60"  rounded="circle" blank-color="#777" alt="Circle image"></b-img>
                        </b-col>
                        <b-col cols="6" align-self="center" class="d-none d-md-block">
                            <p class="mb-1">Juan Ramos</p>
                            <p class="text-muted small mb-1">Tu: Hasta luego</p>
                            
                        </b-col>
                        <b-col cols="3" class="d-none d-md-block">
                            <p class="text-muted small">1:37 pm</p>
                        </b-col>
                    </b-row>
           </b-list-group-item>
         -->
        </b-list-group>
    </div>
</template>

<script>
    export default {
        data() {
            return {
              conversations: []

            };
        },
        mounted() {
            console.log('Component mounted.');
            this.getConversations();
        },
        methods: {
            getConversations() {
              axios.get('/api/conversations')
              .then((response) => {
                console.log(response.data);
                //guardamos en conversations[] la data que viene del servidor (response.data)    
                this.conversations = response.data;
              });

            },

            selectConversation(conversation) {
              console.log(conversation);


            }
        }
    }
</script>