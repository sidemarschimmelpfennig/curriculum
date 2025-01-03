<template>
  <div class="nav">
    <div class="logo">
      <router-link to="/">
        <img src="../assets/image/logo-sgbr.png" alt="" />
      </router-link>
      <p class="farsan-regular">Deus seja louvado!</p>
    </div>
    <ul class="pr-4">
      <router-link class="nav-link" to="/">Inicio</router-link>

      <div v-if="this.candidateID === 0 || this.candidateID === undefined">
        <router-link class="nav-link" to="/joblisting/0"
          >Vagas disponiveis</router-link
        >
      
        <router-link class="nav-link" to="/login">Faça seu Login</router-link>
      </div>
      <div v-else>
        <button
        class="nav-link"
          @click="redirectButton()"

        >
          Vagas disponiveis
        </button>
      
        <router-link class="nav-link" to="/login">Faça seu Login</router-link>

      </div>
    </ul>
  </div>
</template>

<script>
export default {
  name: "NavBar",
  data()
  {
    return{
      candidateID: 0
      
    }
  },
  props: {
    candidateID: {
      type: Number,
      required: true
    }
  },

  methods: {
    getData(){
      const candidateID = this.$route.params.currenteUser
      this.candidateID = candidateID
     
    },

    redirectButton()
    {
      this.$router.push(`/joblisting/${this.candidateID}`)
    }
  },

  mounted()
  {
    this.getData()
    console.log('ID na view NavBar linha 45:', this.candidateID)
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/components/navbar";
</style>
