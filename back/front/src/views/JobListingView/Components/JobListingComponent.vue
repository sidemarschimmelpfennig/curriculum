<template>
  <div class="relative w-full job">    
    <div
      class="w-full px-10 my-4 py-6 bg-white rounded-lg shadow-md job-component"
      v-for="(jobs, id) in joblisting"
      :key="id"
    >
      <div class="flex justify-between items-center job-header">
        <span class="bg-blue-600 text-white font-bold rounded px-2 py-1">
          Departamento: {{ jobs.departament }}
        </span>

        <label class="px-2 py-1 bg-blue-200 text-blue-800 font-bold rounded">
          Categoria: {{ jobs.departament_categories }}
        </label>

      </div>
      <div class="mt-2 job-content">
        <span class="text-2xl text-blue-800 font-bold hover:text-blue-600">
            {{ jobs.name }}
        </span>
        
        <p class="mt-2 text-gray-600">{{ jobs.description }}</p>
        
      </div>
      <div class="mt-4 job-content">
        <h3 class="text-blue-700 mb-4 font-bold">Requisitos:</h3>
        <div class="requisitos-panel flex mx-auto mt-2 my-5 justify-center w-3/4 p-4 bg-blue-50 border border-blue-200 rounded-lg shadow-md">
          <span class="bg-blue-500 text-white font-bold rounded px-4 py-2 ">
            {{ jobs.skills }}
          </span>
        </div>
      </div>
        <span class="text-2xl text-blue-800 font-bold hover:text-blue-600">
          Candidatos aplicados: {{ jobs.count }}
        </span>
      <div class="flex justify-between items-center mt-4">
        <a
          id="candidatar"
          class="readmore text-white hover:cursor-pointer"
          @click="applyJob(jobs.id)"
        >
          Quero me candidatar!
        </a>

        <div>
          <h1 class="text-blue-700 font-bold">Trabalho: {{ jobs.mobilities }}</h1>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from "axios";
  export default {
    data() {
      return {
        joblist: [],
    
        jobID: null,
        candidateID: null,
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
      getData(){
        const candidateID = this.$route.params.currenteUser
        this.candidateID = candidateID
      
      },
      async applyJob(jobid) {
        try {
          const data = {
            jobID: jobid,
            candidateID: this.candidateID

          }
          
          if(this.candidateID === '0')
          {
            this.$router.push({
              path: "/login",
              query:  { message: `Efetue login para prosseguir` }

            })

          } else {
            const response = await axios.post(`${this.api}/apply`, data)

            console.log('Retorno linha 88', response)
            if(response.data.success === false)
            { 
              alert('Você já está candidatado a essa vaga!')  

            }

            if(response.data.success === true)
            {
              alert('Você está candidatado a está vaga!')

            }

          }

        } catch (error) {
          console.error('Erro: ', error)
          
        }
        
      },

      async countCandidates(jobID)
      {
        try {
          const response = await axios.get(`${this.api}/count/${jobID}`)
          return response.data

        } catch (error) {
          console.error('Erro ao buscar a contagem de candidatos:', error);

        }
      }
    },

    mounted() {
      this.joblist = this.joblisting
      this.getData()

      this.joblist.forEach(job => {
          this.countCandidates(job.id).then(count => {
            job.count = count
          })
      });

    },
  };
</script>

<style lang="scss" scoped>
@import "@/assets/scss/components/joblistingcomponent";
</style>