<template>
  <div class="nav">
    <router-link to="/" > <img src="../assets/image/logo-sgbr.png" alt=""> </router-link>
    <ul>
      <router-link class="nav-link" to="/" >Inicio</router-link>
      <router-link class="nav-link" to="/joblisting">Vagas disponiveis</router-link>
      <router-link class="nav-link" to="/register">Cadastre seu curriculo</router-link>
      <router-link class="nav-link" to="/login">Faça seu Login</router-link>
    </ul>
  </div>
</template>

<script>
export default {
  methods: {

  },
};
</script>

<style lang="scss">
  @import '@/assets/scss/components/navbar';
</style>
