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
          disabled
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

      <b-form-group id="input-group-2" label="Nueva contraseña (solo si desea modificar):" label-for="input-2">
        <b-form-input type="password"
            placeholder="Ingresa una nueva contraseña"
            name="password"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Selecione imagen de perfil:" label-for="input-2">
        <b-img v-bind="mainProps" width="60" height="60"  rounded="circle" 
        alt="Imagen de perfil" :src="image"></b-img>
        <b-form-file class="mt-2"
            
            name="image"
            :state="Boolean(file)"
            placeholder="Seleccione una imagen o arrastre hasta qui..."
            drop-placeholder="Drop file here...">
        </b-form-file>
      </b-form-group>

        
      <b-button @click="prueba" type="submit" variant="primary">Actualizar</b-button>
     
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