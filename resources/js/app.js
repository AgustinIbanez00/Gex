require('./bootstrap');
 
window.Vue = require('vue');

Vue.component('nav-component', require('./components/NavComponent.vue').default);
Vue.component('pito-component', require('./Jetstream/ActionMessage.vue').default);
const app = new Vue({
    el: '#app',
});

