<template>
  <NavBar 
    :candidateID="this.candidateID"

  /> 
  <div
    class="joblist"
    
  >
    <div class="p-5 w-full readme flex justify-center">
      <input
        id="input1"
        class="w-96 border pl-4 py-2 rounded focus:border-blue-500 focus:shadow-outline outline-none"
        type="text"
        placeholder="Vaga desejada"
        v-model="searchText"
      />
      <form class="max-w-40 pr-4 w-full">
        <select
          id="countries"
          v-model="selectedCategory"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
          <option value="Todas" selected>Todas</option>
          <option
            v-for="(department, id) in departments"
            :key="id"
            :value="department.departament"
          >
            {{ department.departament }}
          </option>
        </select>
       
      </form>
    </div>

    <div class="bg-blue-400 w-full">
      <h1 class="font-bold text-3xl pt-4 text-white">
        Oportunidades Disponíveis
      </h1>
      <div v-if="filteredJobs.length > 0">
        <JobListingComponent 
          :joblisting="filteredJobs"
          :candidateID="candidateID"
        />
      </div>
      <div v-else :class="{ isNull : arrayFromJobs <= 0 }">
        <h2 class="text-white">Nenhuma Vaga Disponível no momento</h2>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import NavBar from "@/components/NavBar.vue";
import JobListingComponent from "./Components/JobListingComponent.vue";

export default {
  name: "JobListingView",
  data() {
    return {
      departments: [],
      selectedCategory: "Todas",
      searchText: "",
      arrayFromJobs: [],
      errorMessage: "",
      candidateID: null,
      api: process.env.VUE_APP_API_URL,
    };
  },

  components:{
    NavBar
  },
  methods: {
    async getJobsListing() {
      try {
        let response = await axios.get(`${this.api}/jobs`);
        
        console.log(response.data);
        if (response.status === 200) {
          if (response.data && response.data.length > 0) {
            this.arrayFromJobs = response.data;
          } else {
            this.arrayFromJobs = [];
          }
        }
      } catch (error) {
        console.error(error);
        this.arrayFromJobs = [];
        this.errorMessage = "Ocorreu um erro ao tentar carregar as vagas.";
      }
    },

    async getDepartament() {
      try {
        let response = await axios.get(`${this.api}/departament`);
        console.log(response.data.departaments);
        if (response.status === 200) {
          if (response.data && response.data.departaments.length > 0) {
            this.departments = response.data.departaments;
            console.log(this.departments);
          } else {
            this.departments = [];
          }
        }
      } catch (error) {
        console.error(error);
        this.departments = [];
      }
    },

    async getCandidate(){
      
      const candidateID = this.$route.params.currenteUser
      this.candidateID = candidateID
      console.log('Caminho linha 115: ', parseInt(this.candidateID, 10))
    }

  },
  computed: {
    filteredJobs() {
      if (!Array.isArray(this.arrayFromJobs)) return [];
      return this.arrayFromJobs.filter((job) => {
        const matchesSearchText = job.name
          .toLowerCase()
          .includes(this.searchText.toLowerCase());
        const matchesCategory =
          this.selectedCategory === "Todas" ||
          job.department === this.selectedCategory;
        return matchesSearchText && matchesCategory;
      });
    },
  },
  mounted() {
    axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('authToken')}`;
    this.getJobsListing();
    this.getCandidate();
  },
  components: {
    JobListingComponent,
    NavBar
  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/views/joblistingview";

.isNull {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  height: 80vh;
}
</style>
