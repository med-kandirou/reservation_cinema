import { createApp } from 'vue'
import '@/index.css'
import router from '@/router/index.js'

import App from '@/App.vue'
import  "flowbite/dist/flowbite.js";

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

createApp(App).use(router).use(VueSweetalert2).mount('#app')
