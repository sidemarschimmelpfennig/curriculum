<template>
  <NavBar/>
  <div class="home">
    <h1 class="title">Bem-vindo a SGBR!</h1>
    <h2 class="subtitle">Junte-se à nossa equipe!</h2>
    <h3 class="subtitle">Venha crescer conosco e com excelência.</h3>
    <br />
    <button class="btn text-cyan-50" @click="getJobs">
      Venha fazer parte do nosso time.
    </button>
  </div>
</template>

<script>
import NavBar from '@/components/NavBar.vue';

export default {
  name: "HomeView",
  components: {
    NavBar
  },
  methods: {
    getJobs() {
      return this.$router.push("/login");
    },
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/views/homeview";
</style>
