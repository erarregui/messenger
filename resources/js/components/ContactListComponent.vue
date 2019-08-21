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
           
           <!--ACLARACIONES
                Enviar un objeto a un componente hijo :propiedad="valor"
                Hacer click en un componete @click.native
                @click.native="selectConversation(conversation)"
           --> 
                      
        </b-list-group>
    </div>
</template>

<script>
    export default {
        props: {
          conversations: Array
        },

        data() {
            return {
               
            };
        },
        mounted() {
            console.log('Component mounted.');
            
        },
        methods: {
            
            selectConversation(conversation) {
              //console.log(conversation);
              //alert('seleccionado')
              this.$emit('conversationSelected', conversation);
             


            }
        }
    }
</script>