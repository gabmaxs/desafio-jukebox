import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueTheMask from 'vue-the-mask'
import axios from 'axios'
require('@/assets/main.scss');

Vue.use(axios)
Vue.use(VueTheMask)
Vue.config.productionTip = false
axios.defaults.baseURL = "http://localhost:8000/api"

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
