<template>
  <div id="app">
    <!-- Logo ou imagem -->
    <img alt="Vue logo" src="./assets/logo.png" />

    <!-- Título principal -->
    <h1>Consulta de CEP</h1>

    <!-- Link para navegar para a página de buscar CEP aleatório -->
    <router-link to="/">Voltar para a página inicial</router-link>
    <br>
    <router-link to="/random-cep">Ir para Buscar CEP Aleatório</router-link>

    <!-- Área onde o Vue Router irá renderizar as páginas conforme as rotas -->
    <router-view></router-view>
  </div>
</template>

<script>
// Aqui você pode importar outros componentes caso necessário, mas no seu caso, como você está utilizando rotas,
// os componentes já serão carregados no <router-view> automaticamente.
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
  color: #42b983;
}
</style>
