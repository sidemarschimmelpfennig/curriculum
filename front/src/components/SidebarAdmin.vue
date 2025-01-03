<template>
  <div
    class="absolute h-full w-52 bg-blue-600 text-white sidebar-admin flex flex-col"
  >
    <router-link to="/admin">
      <img :src="logo" alt="Logo" class="flex m-auto p-4 h-24 w-auto" />
    </router-link>
    <ul class="flex-grow flex flex-col text-start">
      <li v-for="(item, index) in menuItems" :key="index">
        <router-link
          :to="item.to"
          class="block w-full p-4 hover:bg-blue-700 cursor-pointer"
        >
          {{ item.label }}
        </router-link>
      </li>
    </ul>
    <button
      class="flex items-center justify-start w-full p-4 hover:bg-blue-700"
      @click="logout()"
    >
      <span class="material-icons pr-2 text-white">logout</span>Sair da Conta
    </button>
  </div>
</template>
<script>
import axios from 'axios';

export default {
  name: "SidebarAdmin",
  data() {
    return {
      logo: require("@/assets/image/logo-sgbr.png"),
      menuItems: [
        { label: "Vagas em Aberto", to: "/admin/joblistpage" },
        { label: "Usuários", to: "/admin/userpage" },
        
      ],
      api: process.env.VUE_APP_API_URL,
    };
  },

  methods: {
    async logout(){
      try {
        const response = await axios.get(`${this.api}/logout`) 
        this.$router.push('/login')

      } catch (error) {
        console.error('Error linha 48', error)
      }
    }
  }
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/components/sidebaradmin";
</style>
