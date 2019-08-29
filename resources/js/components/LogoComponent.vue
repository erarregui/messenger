<template>
  
    <b-container >
      <b-form-group id="input-group-2" label="Selecione imagen de perfil:" label-for="input-2">
        <b-img v-bind="mainProps" width="60" height="60"  rounded="circle" 
        alt="Imagen de perfil" :src="image"></b-img>
        
      </b-form-group>
    
  </b-container>
  
</template>

<script>
  export default {
    props: {
        user: Object, //desde el exterior recibimos el objeto user <
    },

    data() {
      return {
        show: true,
        agente: {
          apellido: 'eduardo',
        }
      }
    },
    methods: {
     
      prueba(){
      
      }
      
    },
    computed: {
      image() {
        return `/users/${this.user.image}`
      }
    }
  }
</script>