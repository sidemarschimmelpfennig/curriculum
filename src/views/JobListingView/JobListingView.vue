<template>
  <div class="joblist">
    <div class="mb-4 px-2 w-full">
      <form class="max-w-40 pr-4">
        <select id="countries" v-model="selectedCategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option selected>Categoria</option>
          <option v-for="(department, id) in departments" :key="id" :value="department.name">
            {{ department.name }}
          </option>
        </select>
      </form>
      <input id="input1" class="w-96 border pl-4 py-2 rounded focus:border-blue-500 focus:shadow-outline outline-none" type="text" placeholder="Vaga desejada" />
    </div>
    <div class="bg-blue-400">
      <h1 class="font-bold text-3xl mb-3 pt-4 text-white">Oportunidades Disponíveis</h1>
      <div>
        <JobListingComponent :joblisting="arrayFromJobs"/>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
import JobListingComponent from './Components/JobListingComponent.vue';

export default {
  data() {
    return {
      departments: [
        { name: "Todas" },
        { name: "Desenvolvimento" },
        { name: "Comercial" },
        { name: "Suporte" },
        { name: "Administrativo" }
      ],
      selectedCategory: 'Todas',
      arrayFromJobs: []
    };
  },
  methods: {
    async getJobsListing() {
      try {
        let response = await axios.get('http://localhost:3000/joblisting');
        this.arrayFromJobs = response.data; // Update the arrayFromJobs with the fetched data
      } catch (error) {
        console.log(error);
      }
    }
  },
  mounted() {
    this.getJobsListing();
  },
  components: {
    JobListingComponent
  }
};
</script>

<style lang="scss" scoped>

@import '@/assets/scss/views/joblistingview';

</style>
