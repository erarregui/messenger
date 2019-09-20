<template>
  
    <b-container class="p-0" >
      <b-form-input 
         :value="seleccionado"
          placeholder="dato seleccionado">
      </b-form-input>
      {{ seleccionado }}
      <h1>Numero Vuex {{ $store.state.numero}}</h1>
      <b-button class="btn btn-dark" @click="$store.commit('aumentar')">+</b-button>


          
    </b-container>
  
</template>

<script>
  export default {
    props: {
        seleccionado: Number,
        tipo: ''
    },

    data() {
      return {
        
    }
  },
    
    mounted(){
      console.log(`dato seleccionado: ${this.seleccionado}`)

    },

    methods: {
        
    },
    
    
  }
</script>