<template>
  <div class="relative w-full job">
    
    <div
      class="w-full px-10 my-4 py-6 bg-white rounded-lg shadow-md job-component"
      v-for="(jobs, id) in joblisting"
      :key="id"
    >
      <div class="flex justify-between items-center job-header">
        <span class="bg-blue-600 text-white font-bold rounded px-2 py-1">
          {{ jobs.departament }}
        </span>

        <label class="px-2 py-1 bg-blue-200 text-blue-800 font-bold rounded">
          {{ jobs.departament_categories }}
        </label>

      </div>
      <div class="mt-2 job-content">
        <span class="text-2xl text-blue-800 font-bold hover:text-blue-600">
            {{ jobs.name }}
        </span>
        
        <p class="mt-2 text-gray-600">{{ jobs.description }}</p>
      </div>
      <div class="mt-2 job-content">
        <h3 class="text-blue-700 mb-4 font-bold">Requisitos:</h3>
        <span class="bg-blue-500 text-white font-bold rounded px-4 py-1 mx-4" >
          {{ jobs.skills }}
        </span>
        
      </div>
      <div class="flex justify-between items-center mt-4">
        <a
          id="candidatar"
          class="readmore text-white hover:cursor-pointer"
          @click="applyJob(jobs.id)"
        >
          Candidatar
        </a>

        <div>
          <h1 class="text-blue-700 font-bold">{{ jobs.mobilities }}</h1>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//import ApplyForaJobForm from "./__.vue";
import axios from "axios";
export default {
  data() {
    return {
      joblist: [],
      isApplied: [],
      showModal: false,
      jobID: null,
      api: process.env.VUE_APP_API_URL,
    };
  },
  props: {
    joblisting: {
      type: Array,
      required: true,
    },
    candidateID: {
      type: Number,
      required: true
    }

  },
  
  methods: {
    async applyJob(jobid) {
      try {
        const data = {
          jobID: jobid,
          candidateID: this.candidateID

        }

        console.log('Dados de envio', data)
        
        const response = await axios.post(`${this.api}/apply`, data)
        console.log('Retorno', response)
        if(response.data.success === true)
        {
          alert('Você está candidato a está vaga!')

        }
        
      } catch (error) {

        if(error.response.data.code === '2300') {
          alert('Você já se candidatou a essa vaga')
            
        } 
        console.error('Erro', error)
      }
      
    },
  },

  mounted() {
    this.joblist = this.joblisting
    console.log('Linha 104', this.candidateID)

  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/components/joblistingcomponent";
</style>