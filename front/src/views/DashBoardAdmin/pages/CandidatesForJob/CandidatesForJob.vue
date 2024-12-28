<template>
  <div class="joblist-table p-5">
  

    <div
      id="joblist-table"
      class="bg-white shadow-md rounded-lg overflow-hidden"
    >
      <div
        id="joblist-table-heading"
        class="flex text-sm font-semibold bg-gray-200 text-gray-700 p-4"
      >
        <div class="w-1/5">Nome do Candidato</div>
        <div class="w-1/5">Email</div>
        <div class="w-1/5">Telefone</div>
        <div class="w-1/5">Status</div>
        <div class="w-1/5 text-center">Ações</div>
      </div>
      <div id="joblist-table-rows" class="divide-y">
        <div
          v-for="(job, id) in jobs"
          :key="id"
          class="joblist-table-row flex items-center p-4 text-gray-600 hover:bg-gray-100 transition"
        >
          <div class="w-1/5 truncate">{{ job.candidate_name }}</div>
          <div class="w-1/5 truncate">
            {{ job.email }}
          </div>
          <div class="w-1/5 truncate">
            {{ job.phone }}
          </div>

          <div class="w-1/5 truncate">
            {{ job.status_curriculum }}
          </div>

          <div class="w-1/5 flex justify-center space-x-2">
            <button
              class="material-icons text-blue-600 hover:text-blue-800 border-none outline-none"
              @click="updateCandidate(job.id)"
            >
              edit
            </button>

            <button
              class="material-icons text-gray-600 hover:text-gray-800"
              @click="download(job.id, job.candidate_id)"

            >
              download
            </button>
          </div>
        </div>
      </div>

      <ViewCandidate
        v-if="showModalUpdate"
        :show="showModalUpdate"
        :candidateID="candidateID"

      />
    </div>
  </div>
</template>
  <script>
import axios from "axios";
import ViewCandidate from "./Forms/ViewCandidate.vue";

export default {
  name: "JobListComponent",
  data() {
    return {
      jobs: [],
      search: "",
      showModalUpdate: false,

      candidateID: "",
      api: process.env.VUE_APP_API_URL,
    };
  },
  components: {
    ViewCandidate
  },
  methods: {
    async getJobs() {
      try {
        let id = this.$route.params.id;
        const response = await axios.get(`${this.api}/admin/candidates/job/${id}`);
        console.log('Candidatos por vaga', response)
        console.log('ID', id)
        this.jobs = response.data;
        
      } catch (error) {
        console.error('Erro linja 85:', error);
      }
    },
    async download(jobID, candidateID) {
      try {
        const candidate = await axios.get(`${this.api}/admin/candidate/${candidateID}`)
        const response = await axios.get(`${this.api}/admin/download/candidate/${jobID}`, {
          responseType: 'blob'

        });
        
        const blob = new Blob([response.data], { type: response.headers['content-type'] });
        const url = window.URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', `${candidate.data.id}_${candidate.data.candidate_name}`); // Set the default file name
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
      } catch (error) {
        console.error(error);
      }
    },

    updateCandidate(id)
    {
      this.candidateID = String(id)
      this.showModalUpdate = true;

    }

  
  },
  mounted() {
    this.getJobs();
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/views/candidatesforjob";
</style>