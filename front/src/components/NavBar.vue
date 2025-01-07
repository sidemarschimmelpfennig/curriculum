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

      <div v-if="token">
        <button
        class="nav-link"
          @click="redirectButton()"

        >
          Vagas disponiveis
        </button>
      
        <button
          class="nav-link"
          @click="logout"
        >
          Sair da conta
        </button>
        
      </div>
      <div v-else>
        <router-link class="nav-link" to="/joblisting/0"
          >Vagas disponiveis</router-link
        >
      
        <router-link class="nav-link" to="/login">Faça seu Login</router-link>

      </div>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: "NavBar",
  data()
  {
    return{
      token: null,
      api: process.env.VUE_APP_API_URL
    }
  },

  methods: {
    getData(){
      const candidateID = this.$route.params.currenteUser
      this.candidateID = candidateID
     
    },

    redirectButton()
    {
      this.$router.push(`/joblisting/0`)
    },

    async logout(){
      try {
        const response = await axios.get(`${this.api}/logout`) 
        this.$router.push('/login')

      } catch (error) {
        console.error('Error linha 48', error.response)
      }
    }
  },

  mounted()
  {
    //this.getData()
    this.token = axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('authToken')}`;
   
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/components/navbar";
</style>
