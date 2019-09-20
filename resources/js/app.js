
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import Vuex from 'vuex';
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);
Vue.use(Vuex);


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('contact-component', require('./components/ContactComponent.vue').default);
Vue.component('contact-list-component', require('./components/ContactListComponent.vue').default);
Vue.component('active-conversation-component', require('./components/ActiveConversationComponent.vue').default);
Vue.component('message-conversation-component', require('./components/MessageConversationComponent.vue').default);
Vue.component('messenger-component', require('./components/MessengerComponent.vue').default);
Vue.component('status-component', require('./components/StatusComponent.vue').default);
Vue.component('profile-component', require('./components/ProfileComponent.vue').default);
Vue.component('datos-component', require('./components/DatosComponent.vue').default);
Vue.component('datos-component2', require('./components/DatosComponent2.vue').default);


Vue.component('students-component', require('./components/StudentsComponent.vue').default);

//Vue.component('toast-component', require('./components/ToastComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.Store({
  state: {  //se crea un estado
    messages: [],
    numero: 10
  },
  //manipular el estado a travez de mutaciones
  mutations: {
  	newMessagesList(state, messages){
  		state.messages = messages;
  	},
  	addMessage(state, message){
  	    state.messages.push(message);
  	},
    aumentar(state){
      state.numero ++
    }
  }
});


const app = new Vue({
    el: '#app',
    store: store,
    methods: {   
    	logout() {
    		document.getElementById('logout-form').submit();
    		alert('Salir?');
    	}
    }
});
