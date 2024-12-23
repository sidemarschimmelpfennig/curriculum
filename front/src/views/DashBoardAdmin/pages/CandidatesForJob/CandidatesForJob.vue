<template>
  <div class="joblist-table p-5">
    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
      <div class="flex flex-wrap justify-center gap-4">
        <input
          id="input1"
          class="w-80 border pl-4 p-2 rounded-md focus:ring-2 focus:ring-blue-500 outline-none shadow-sm"
          type="text"
          placeholder="Nome do Candidato"
        />
        <form class="w-60"></form>
      </div>
    </div>

    <div
      id="joblist-table"
      class="bg-white shadow-md rounded-lg overflow-hidden"
    >
      <div
        id="joblist-table-heading"
        class="flex text-sm font-semibold bg-gray-200 text-gray-700 p-4"
      >
        <div class="w-1/5">Nome do Candidato</div>
        <div class="w-2/5">Email</div>
        <div class="w-1/5">Telefone</div>
        <div class="w-1/5 text-center">Ações</div>
      </div>
      <div id="joblist-table-rows" class="divide-y">
        <div
          v-for="(job, id) in jobs"
          :key="id"
          class="joblist-table-row flex items-center p-4 text-gray-600 hover:bg-gray-100 transition"
        >
          <div class="w-1/5 truncate">{{ job.full_name }}</div>
          <div class="w-2/5 truncate">
            {{ job.email }}
          </div>
          <div class="w-1/5 truncate">
            {{ job.contactphone }}
          </div>
          <div class="w-1/5 flex justify-center space-x-2">
            <button class="material-icons text-red-600 hover:text-red-800">
              delete
            </button>
            <button class="material-icons text-blue-600 hover:text-blue-800">
              edit
            </button>

            <button class="material-icons text-gray-600 hover:text-gray-800">
              visibility
            </button>
            <button
              class="material-icons text-gray-600 hover:text-gray-800"
              @click="download(job.id)"
            >
              download
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  <script>
import axios from "axios";

export default {
  name: "JobListComponent",
  data() {
    return {
      jobs: [],
      search: "",
    };
  },
  methods: {
    async getJobs() {
      try {
        let id = this.params.id;
        console.log('ID', this.id)
        console.log('route', this.$route)
        let response = await axios.get(`${this.api}/job/${id}`);

        //this.jobs = response.data.candidates;
        console.log(response);
      } catch (error) {
        console.error('Erro linja 85:', error);
      }
    },
    async download(id) {
      try {
        let response = await axios.get(
          `http://localhost:5000/api/candidates/download/id/${id}`
        );
        console.log(response);
      } catch (error) {
        console.error(error);
      }
    },
  },
  mounted() {
    this.getJobs();
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/views/candidatesforjob";
</style>