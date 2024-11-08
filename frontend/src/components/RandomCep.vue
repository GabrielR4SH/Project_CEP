<template>
  <div class="random-cep">
    <h1>Buscar CEP Aleatório</h1>
    <button @click="buscarCepAleatorio" :disabled="loading">Buscar CEP Aleatório</button>
    <div v-if="loading" class="loading">
      <div class="spinner"></div>
      <p>Aguarde que estamos procurando um CEP Aleatório para você :)</p>
    </div>
    <div v-if="cepData && !loading" class="cep-info">
      <p><strong>CEP:</strong> {{ cepData.cep }}</p>
      <p><strong>Logradouro:</strong> {{ cepData.logradouro }}</p>
      <p><strong>Bairro:</strong> {{ cepData.bairro }}</p>
      <p><strong>Cidade:</strong> {{ cepData.localidade }}</p>
      <p><strong>Estado:</strong> {{ cepData.uf }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cepData: null,
      loading: false
    }
  },
  methods: {
    async buscarCepAleatorio() {
      this.loading = true
      this.cepData = null

      try {
        const response = await fetch('http://localhost:8000/api/random-cep')
        if (!response.ok) {
          throw new Error('Erro ao buscar o CEP')
        }
        this.cepData = await response.json()
      } catch (error) {
        console.error(error)
      } finally {
        this.loading = false
      }
    }
  }
}
</script>

<style scoped>
.random-cep {
  text-align: center;
}

button {
  margin: 20px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

.loading {
  margin-top: 20px;
}

.spinner {
  width: 40px;
  height: 40px;
  border: 5px solid rgba(0, 0, 0, 0.1);
  border-top-color: #333;
  border-radius: 50%;
  animation: spin 1s linear infinite;
  margin: 0 auto; 
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}

.cep-info {
  margin-top: 20px;
}
</style>
