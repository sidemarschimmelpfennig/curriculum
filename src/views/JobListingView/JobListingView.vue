<template >
  <div class="joblist" >
    <div class="mb-4 px-2 w-full teste">
      <form class="max-w-40 pr-4">
        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
          <option selected>Categoria</option>
          <option v-for="(department, id) in departments" :key="id" :value="department.name">
            {{ department.name }}
          </option>
        </select>
      </form>
      <input id="input1" class="w-96 border pl-4 py-2 rounded
      focus:border-blue-500 focus:shadow-outline
      outline-none " type="text"  placeholder="Vaga desejada" />

    </div>
    <hr class="mb-4">
    <h1 class="mb-2 font-bold text-3xl mb-3">Oportunidades Disponiveis</h1>
    <p v-if="joblist.lenght < 0">Foram encontradas {{ joblist.lenght + 1 }} Oportunidades disponiveis.</p>
    <p v-else>Não há nenhuma vaga disponivel no momento.</p>


  <div class="p-24">
    <div class="w-full  px-10 my-4 py-6 bg-white rounded-lg shadow-md"  v-for="(jobs, id) in joblist" :key="id" >
          <div class="flex justify-between items-center">
              <span class="font-light text-gray-600">{{ jobs.start_date }}</span>
              <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500" href="#">{{ jobs.department }}</a>
          </div>
          <div class="mt-2">
              <a class="text-2xl text-gray-700 font-bold hover:text-gray-600" href="#">{{ jobs.jobname }}</a>
              <p class="mt-2 text-gray-600">{{ jobs.description }}</p>
          </div>
          <div class="flex justify-between items-center mt-4">
              <a class="readmore" href="#">Saiba mais</a>
              <div>
                  <a class="flex items-center" href="#">
                      <h1 class="text-gray-700 font-bold">Remoto</h1>
                  </a>
              </div>
          </div>
    </div>
  </div>
</div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return{
      departments: [
        {name: "Todas"},
        {name : "Desenvolvimento"},
        {name : "Comercial"},
        {name : "Suporte"},
        {name :"Administrativo"}
      ],
      joblist:[]

    };
  },
  methods: {
    async getJobsListing(){
      try {
        let response = await axios.get('http://localhost:3000/joblisting');
        this.joblist = response.data
      } catch (error) {
        console.log(error)
      }
    }
  },
  mounted() {
    this.getJobsListing()
  },
};
</script>

<style scoped>
/* Add your custom styles here */
.teste{
  margin: 50px 0;
  display: flex;
  justify-content: center;
  margin-right: 0;
}

.joblist{
  height: 100%;
}

.readmore{
  color: rgba(0,0,255, 0.5);
  font-weight: 900;
}
.readmore:hover{
  background-color: rgba(0,0,255, 0.5) ;
  color: white;
  border-radius: 0.4rem;
  padding: 10px;
}
</style>
