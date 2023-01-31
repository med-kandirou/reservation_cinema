import { createRouter, createWebHistory } from 'vue-router'
import index from '../views/index.vue'
import login from '../views/login.vue'
import register from '../views/register.vue'
import movies from '../views/movies.vue'
const routes = [
  {
    path: '/',
    name: 'home',
    component: index
  },
  {
    path: '/login',
    name: 'login',
    component: login
  },
  {
    path: '/register',
    name: 'register',
    component: register
  },{
    path: '/movies',
    name: 'movies',
    component: movies
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router