<template>
  <div class="p-24">
    <div class="w-full px-10 my-4 py-6 bg-white rounded-lg shadow-md" v-for="(jobs, id) in joblisting" :key="id">
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
</template>
<script>
export default {
  data(){
    return {
      joblist:[]
    }
  },
  props:{
    joblisting: {
      type: Array,
      required: true
    }
  },
  mounted() {
    this.joblist = this.joblisting
  },
}
</script>
