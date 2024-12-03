<template>
  <button @click="sendDataToParent">Enviar Dados</button>
</template>
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
