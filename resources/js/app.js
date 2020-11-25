require('./bootstrap');
 
window.Vue = require('vue');

Vue.component('cursos-component', require('./components/CursosComponent.vue').default); 
Vue.component('examenes-component', require('./components/ExamenesComponent.vue').default); 
Vue.component('materias-component', require('./components/MateriasComponent.vue').default); 
const app = new Vue({
    el: '#app',
});

