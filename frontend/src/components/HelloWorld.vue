<template>
  <div class="hello">
    <h1>Consultar CEP</h1>
    <div class="input-wrapper">
      <input
        type="text"
        placeholder="Digite o CEP"
        v-model="cep"
        @keyup.enter="fetchCepData"
      />
      <span class="search-icon" @click="fetchCepData">🔍</span>
    </div>
    <div v-if="cepData">
      <p><strong>CEP:</strong> {{ cepData.cep }}</p>
      <p><strong>Logradouro:</strong> {{ cepData.logradouro }}</p>
      <p><strong>Bairro:</strong> {{ cepData.bairro }}</p>
      <p><strong>Cidade:</strong> {{ cepData.localidade }}</p>
      <p><strong>Estado:</strong> {{ cepData.uf }}</p>
      <p><strong>Região:</strong> {{ cepData.regiao }}</p>
      <p><strong>DDD:</strong> {{ cepData.ddd }}</p>
    </div>
    <p v-else-if="cep.length === 8 && !cepData">CEP não encontrado.</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cep: '',
      cepData: null,
    };
  },
  methods: {
    async fetchCepData() {
      // Verificar se o CEP contém 8 dígitos numéricos
      if (/^\d{8}$/.test(this.cep)) {
        try {
          const response = await fetch(`http://localhost:8000/api/cep/${this.cep}`);
          if (!response.ok) {
            throw new Error('Erro ao buscar o CEP');
          }
          this.cepData = await response.json();
        } catch (error) {
          console.error('Erro ao buscar o CEP:', error);
          this.cepData = null;
        }
      } else {
        alert('Por favor, insira um CEP válido com 8 dígitos numéricos.');
        this.cepData = null;
      }
    },
  },
};
</script>

<style scoped>
.hello {
  text-align: center;
}

.input-wrapper {
  position: relative;
  display: inline-block;
}

input {
  width: 200px;
  padding: 8px 30px 8px 10px;
  font-size: 16px;
  box-sizing: border-box;
}

.search-icon {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  font-size: 16px;
}

p {
  margin: 5px 0;
}
</style>
