<template>
    <b-img :blank-color="online ? 'green' : 'gray'"
           :title="online ? 'Conectado' : 'Desconectado'"
      blank width="10" height="10"  rounded="circle" alt="Circle image"></b-img> 
</template>

<script>
    export default {
        //propiedades que vienen de forma externa
        //puede ser un array o un objet
        props: {
            online: Boolean,
            verga : Boolean
            
        },

        data() {  //funcion data() devuelve un objeto
            return {
                
            };
        },
        mounted() {

            console.log(`estado de la puta variable: ${this.online}`);
        }
        
    }
</script>