<template>
        <b-list-group>
            <contact-component 
                v-for="conversation in conversations"
                :key="conversation.id"
                :conversation="conversation"
                @click.native="selectConversation(conversation)"
                :selected="selectedConversationId === conversation.id">
             
            </contact-component>
           
           <!--ACLARACIONES
                Enviar un objeto a un componente hijo :propiedad="valor"
                Hacer click en un componete @click.native
                @click.native="selectConversation(conversation)"
           --> 
        </b-list-group>
</template>

<script>
    export default {
        props: {
          conversations: Array
        },

        data() {
            return {
               selectedConversationId: null
            };
        },
        mounted() {
            console.log('Component mounted.');
            
        },
        methods: {
            selectConversation(conversation) {
                this.selectedConversationId = conversation.id;
                this.$emit('conversationSelected', conversation);
            }
        }
    }
</script>