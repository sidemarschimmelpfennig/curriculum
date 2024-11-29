<template>
    <button @click="sendDataToParent">Enviar Dados</button>
  </template>
  
  <script>
  export default {
    methods: {
      sendDataToParent() {
        this.$emit('dataSent', { name: 'Vue.js' });
      }
    }
  };
  
  

  methods: {
    sendDataToAPI() {
      axios.post('https://api.exemplo.com/dados', {
        name: 'Vue.js',
        description: 'Framework JavaScript'
      })
      .then(response => {
        console.log('Dados enviados com sucesso:', response.data);
      })
      .catch(error => {
        console.error('Erro ao enviar dados:', error);
      });
    }
  }
  

  \\requisicao de dados axios
  import axios from 'axios';

export default {
  data() {
    return {
      userData: null,
    };
  },
  mounted() {
    this.fetchUserData();
  },
  methods: {
    fetchUserData() {
      axios.get('https://api.exemplo.com/usuario')
        .then(response => {
          this.userData = response.data;
        })
        .catch(error => {
          console.error('Erro ao requisitar dados:', error);
        });
    }
  }
};

</script>