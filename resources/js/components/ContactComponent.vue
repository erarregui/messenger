<template>
    <b-list-group-item :variant="variant" >
        <b-row class="p-2" align-h="center">
            <b-col cols="12" md="3" class="text-center">
                <b-img v-bind="mainProps" blank width="60" height="60"  rounded="circle" blank-color="#777" alt="Circle image"></b-img>
            </b-col>
            <b-col cols="6" align-self="center" class="d-none d-md-block">
                <p class="mb-1">{{ conversation.contact_name }}</p>
                <p class="text-muted small mb-1">{{ conversation.last_message }}</p>
                
            </b-col>
            <b-col cols="3" class="d-none d-md-block">
                <p class="text-muted small">{{ lastTime }}</p>
            </b-col>
        </b-row>
     </b-list-group-item>
</template>

<script>
    export default {
        //propiedades que vienen de forma externa
        //puede ser un array o un objet
        props: {
            variant: String,
            conversation: Object
        },

        data() {  //funcion data() devuelve un objeto
            return {
                
            };
        },
        mounted() {
            console.log('Component mounted.')
            //alert('Component mounted')
        },
        computed: {
            lastTime() {
                return moment(this.conversation.last_time, "YYYY-MM-DD hh:mm:ss").locale('es').fromNow();
            }
        }
    }
</script>

