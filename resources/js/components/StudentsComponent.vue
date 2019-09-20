<template>
	<b-container >
    <b-form class="m-3" @submit.prevent="storeStudent" >

      <b-form-group id="input-group-2" label="Nombre:" label-for="input-2">
        <b-form-input
          name="name"
          id="name"
          required
          placeholder="Ingrese nombre"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Apellido:" label-for="lastName">
        <b-form-input
          name="lastName"
          id="lastName"
          required
          placeholder="Ingrese nombre"
        ></b-form-input>
      </b-form-group>

      <b-form-group
        id="input-group-1"
        label="Correo electronico:"
        label-for="input-1"
        description=""
      >
        <b-form-input
          id="input-1"
          name="email"
          type="email"
          
          placeholder="Ingrese email"
        ></b-form-input>
      </b-form-group>

      <b-form-select v-model="selected" >
      		<option v-for="curso in cursos" v-bind:value="curso.id">
                  {{ curso.nameCourse }}
            </option>
      </b-form-select>
      <span>Selected: {{ selected }}</span>

      <b-form-group id="mount" label="Importe a pagar:" label-for="mount">
        <b-form-input
          name="amount"
          type="number"
          id="mount"
          required
          placeholder="Ingrese Importe"
        ></b-form-input>
      </b-form-group>

      <datos-component2 v-if="selected === 1 || selected === 2"
       :seleccionado="selected"/>
      
      
      <b-button type="submit" variant="primary">Agregar</b-button>
       <h1>Numero Vuex {{ $store.state.numero}}</h1>

    </b-form>
    <b-modal v-model="modalShow">Numero Vuex {{ $store.state.numero}}</b-modal>
    
  </b-container>
</template>

<script>
  export default {
  	data(){
  		return {
  			cursos: [],
  			selected: String,
  			prueba: '',
  			modalShow: false,
  			mensaje: ''
  		}
  	},
    
    mounted(){
      this.getCursos();
      console.log(this.selected)
    },

    methods: {
      getCursos(){
        axios.get('/api/cursos')
         .then((response) => {
          console.log(response.data);
          console.log(this.selected);
          this.cursos = response.data
         })
         .catch((error) => alert(error));
      },

      storeStudent(){
      	console.log(this.selected)
      	if(this.selected === ''){
      		//this.mensaje='debe selecionar un curso'	
      		//this.modalShow =true
      		alert('debe selecionar un cursos');
      	}
      	this.modalShow =true
      	//alert(this.$store.state.numero);

      }

	}
}	
</script>