<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png" />
    <!-- Link para navegar para a página de buscar CEP aleatório -->
    <br>
    <router-link v-if="$route.path !== '/' " to="/">Voltar para a página inicial</router-link>
    <br>
    <router-link v-if="$route.path !== '/random-cep'" to="/random-cep">Ir para Buscar CEP Aleatório</router-link>

    <!-- Área onde o Vue Router irá renderizar as páginas conforme as rotas -->
    <router-view></router-view>
  </div>
</template>


<script>
export default {
  name: 'App',
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

button {
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  margin-top: 20px;
}

a {
  text-decoration: none;
  color: #1594cf;
}
</style>
