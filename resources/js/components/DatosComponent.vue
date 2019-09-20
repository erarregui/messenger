<template>
  
    <b-container >
    <b-form class="m-3" action="" method="post" enctype="multipart/form-data" >
      <input type="hidden" name="_token" v-model="csrfToken">
      <b-form-group
        id="input-group-1"
        label="Correo electronico:"
        label-for="input-1"
        description="We'll never share your email with anyone else."
      >
        <b-form-input
          id="input-1"
          name="email"
          v-model="user.email"
          type="email"
          disabled="false"
          placeholder="Ingrese email"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Nombre:" label-for="input-2">
        <b-form-input
          name="name"
          id="input-2"
          v-model="user.name"
          required
          placeholder="Ingrese nombre"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Apellido:" label-for="input-2">
        <b-form-input
          name="lastName"
          id="input-2"
          v-model="user.name"
          required
          placeholder="Ingrese nombre"
        ></b-form-input>
      </b-form-group>
      
      
      <input type="text" v-model="nuevaFruta" @keyup.enter="mostrarFruta" name="">
      <ul>
        <li v-for="fruta in frutas">
          <input type="number" v-model.number="fruta.cantidad" name="">
          {{ fruta.nombre }} - {{ fruta.cantidad}}
          <b-button @click="fruta.cantidad++">+</b-button>
          <b-button class="bg-danger" @click="makeToast">Borrar</b-button>
          <span v-if="fruta.cantidad === 0"> - Sin stock</span>
        </li>
      </ul>  
      <b-button @click="mostrarFruta">aceptar</b-button>
      <div :class="claseDiv">
         <h4>TOTAL: {{ sumarFrutas }}</h4>
         <input v-model.number="age" >
      </div>


      
        <b-form-select v-model="selected" :datoSeleccionado="selected">
            <option v-for="curso in cursos" v-bind:value="curso.id">
                  {{ curso.nameCourse }}
            </option>
        </b-form-select>
        <span>Selected: {{ selected }}</span>
        <datos-component2>
          
        </datos-component2>
       
      <b-button @click="" type="" v-bind:disabled="variable" variant="primary">Actualizar</b-button>

    </b-form>
    
  </b-container>
  
</template>

<script>
  export default {
    props: {
        user: Object, //desde el exterior recibimos el objeto user <profile-component :user="{{ auth()->user() }}"/>
        csrfToken: String
    },

    data() {
      return {
        selected: '',
        cursos: [],
        variable: false,
        frutas: [
          {nombre: 'pera', cantidad:1},
          {nombre: 'manzana', cantidad:0},
          {nombre:'platano', cantidad:1}
        ],
        nuevaFruta: '',
        total: 0,
        claseDiv: '',
        toastCount: 0
      }
    },
    
    mounted(){

      this.getCursos();
      
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
      mostrarFruta(){
        
        if (this.nuevaFruta == '') {
          
          alert('debe ingresar algo')
        }else {
              this.frutas.push({
              nombre: this.nuevaFruta , cantidad: 0});
              this.nuevaFruta = '';
      }
     },
      makeToast(append = false) {
        this.toastCount++
        this.$bvToast.toast(`This is toast number ${this.toastCount}`, {
          title: 'BootstrapVue Toast',
          autoHideDelay: 5000,
          variant: 'danger',
          appendToast: append
        })
      },

   },

    computed: {
      sumarFrutas() {
        this.total = 0;
        for( var fruta of this.frutas){
          this.total = this.total + fruta.cantidad;
        }
        if (this.total == 0){ 
          this.claseDiv = 'bg-danger';
        }else {
          this.claseDiv = '';
        }
        return this.total;
        
       
        
      }

    }
    
  }
</script>