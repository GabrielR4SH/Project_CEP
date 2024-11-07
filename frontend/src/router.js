import { createRouter, createWebHistory } from 'vue-router'
import Home from './components/HelloWorld.vue'
import RandomCep from './components/RandomCep.vue' // Página para buscar CEP aleatório

const routes = [
  { path: '/', component: Home },
  { path: '/random-cep', component: RandomCep }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
