require('./bootstrap');
 
window.Vue = require('vue');

Vue.component('nav-component', require('./components/NavComponent.vue').default);
Vue.component('cursos-component', require('./components/CursosComponent.vue').default); 
const app = new Vue({
    el: '#app',
});

