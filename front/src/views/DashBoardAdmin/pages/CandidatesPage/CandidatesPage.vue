<template>
  <div
    class="userpage"
    :class="{ activeModalClass: showModal }"
  >
    <ViewCandidate
      v-if="showModal"
      :showModal="showModal"
    />
    <div
      class="grid grid-cols-1 gap-4 p-6 mx-auto bg-white rounded-lg shadow-md"
    >
      <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-center flex-1">
          Todos os candidatos do Sistema
        </h2>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
          <thead class="bg-gray-100 border-b rounded-xl">
            <tr>
              <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
                Nome
              </th>
              <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
                Email
              </th>
              <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
                CPF
              </th>
              <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
                Status
              </th>

              <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
                Ações
              </th>
            </tr>
          </thead>
          <tbody v-if="candidates.length">
            <tr
              v-for="candidate in candidates"
              :key="candidate.id"
              class="border-b text-start"
            >
              
              <td class="px-4 py-2 text-sm text-gray-700">{{ candidate.full_name }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ candidate.email }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ candidate.cpf }}</td>
              <td class="px-4 py-2 text-sm text-gray-700"> {{ candidate.active === 1 ? "Ativo": "Desativado" }}</td>

              <td class="px-4 py-2 text-sm text-gray-700">
                <button
                  class="material-icons text-gray-600 hover:text-gray-800 border-none outline-none"
                  @click="viewModal"
                >
                  visibility
                </button>
              </td>

            </tr>
          </tbody>
          <div
            v-else
            class="text-center p-4 w-full flex justify-center font-bold text-gray-600"
          >
            Nenhum usuário encontrado.
          </div>
        </table>
       
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import ViewCandidate from "./ViewCandidate.vue";

export default {
  name: "CandidatesPage",
  data() {
    return {
      candidates: [],
      showModal: false,
      api: process.env.VUE_APP_API_URL,
    };
  },

  components: {
    ViewCandidate

  },
  methods: {
    closeModal() {
      this.showModal = false;
      this.getAllUsers();

    },

    viewModal()
    {
      this.showModal = true
    },
   
    async getAllUsers() {
      axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('authToken')}`;
      
      try {
        const response = await axios.get(`${this.api}/admin/candidates`);
        this.candidates = response.data.all;
        
      } catch (error) {
        if(error.response.status === 401 )
        { 
          this.$router.push({
            path: "/login",
            query:  { message: `Acesso negado, faça login para prosseguir` }

          })

        }

        console.error('Erro ao pegar todos os candidatos:', error)
      }
    },
  },
  mounted() {
    this.getAllUsers();
  },
  
};
</script>

<style lang="scss" scoped>
  @import "@/assets/scss/admin/pages/userpage";

</style>