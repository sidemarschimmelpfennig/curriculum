<template>
  <button @click="sendDataToParent">Enviar Dados</button>
</template>

// export default { // methods: { // sendDataToParent() { //
this.$emit('dataSent', { name: 'Vue.js' }); // } //} //};
<script>
//requisicao de dados axios
import axios from "axios";

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
      axios
        .get("https://api.exemplo.com/usuario")
        .then((response) => {
          this.userData = response.data;
        })
        .catch((error) => {
          console.error("Erro ao requisitar dados:", error);
        });
    },
  },
};
</script>
