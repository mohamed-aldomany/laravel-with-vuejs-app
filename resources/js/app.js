require('./bootstrap');
require('admin-lte'); 

window.Vue = require('vue');

import VueRouter from 'vue-router' //building Single Page Applications with Vue.js "vue router"
Vue.use(VueRouter)


let fire = new Vue(); // to update data in table 
window.fire = fire;

import { Form, HasError, AlertError } from 'vform' // v-form library
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form =Form;

import moment from 'moment' //time library

import VueProgressBar from 'vue-progressbar' // progressbar library
const options = {
  color: 'yellow',
  failedColor: 'red',
  thickness: '5px',
  transition: {
    speed: '0.5s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'top',
  inverse: false
}
Vue.use(VueProgressBar, options)

import swal from 'sweetalert2'    //sweet alert
window.swal = swal
       
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast=toast


let routes = [
    { path: '/dashboard', component: require("./components/Dashboard.vue") },
    { path: '/profile', component: require("./components/Profile.vue") },
    { path: '/users', component: require("./components/Admin/User.vue") },
    { path: '/developer', component: require("./components/Developer.vue") }
  ]
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })



Vue.filter('capitalize', function (text) {
  if (!text) return ''
  text = text.toString()
  return text.charAt(0).toUpperCase() + text.slice(1)
})

Vue.filter('myDate', function (created) {
  return moment(created).format("MMM Do YY");
})


Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue')
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue')
);

const app = new Vue({
    el: '#app',
    router
});
