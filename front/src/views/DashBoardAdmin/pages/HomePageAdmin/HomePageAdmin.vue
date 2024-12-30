<template>
  <div class="container-home">
    <h1 class="pt-12 pb-4 text-5xl font-bold">Bem vindo, {{ user }} ! <br /></h1>
    <h1 class="font-semibold text-2xl">
      Veja as vagas com o processo de seleção finalizado na ultima semana:
    </h1>
  </div>
</template>
<script>
export default {
  name: "default",

  data(){
      return{
        user: null

      }
  },
  
  methods: {
    async getUser(){
      const user = this.$route.params.currenteUser;
      this.user = user
      console.log('Usuário atual 22:', this.user)
    }
  },

  mounted() {
    this.getUser()
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/admin/pages/homepage";
</style>