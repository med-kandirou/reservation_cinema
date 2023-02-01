import { createRouter, createWebHistory } from 'vue-router'
import index from '../views/index.vue'
import login from '../views/login.vue'
import register from '../views/register.vue'
import movies from '../views/movies.vue'
import reservation from '../views/reservation.vue'
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
  },
  {
    path: '/reservation/:id',
    name: 'reservation',
    component: reservation
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router