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

      
        <b-form-select v-model="selected">
            <option v-for="curso in cursos" v-bind:value="curso.id">
                  {{ curso.nameCurso }}
            </option>
        </b-form-select>
        <span>Selected: {{ selected }}</span>
       
      <b-button @click="prueba" type="submit" v-bind:disabled="variable" variant="primary">Actualizar</b-button>

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
      }
    },
    
    mounted(){

      this.getCursos();

    },

    methods: {
     
      getCursos(){
        axios.get('/api/conversations')
         .then((response) => {
          console.log(response.data);
          console.log(this.selected);
          this.cursos = response.data

         });
      }
    },
    
  }
</script>