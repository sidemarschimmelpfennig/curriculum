<template>
  <div class="w-full job">
    <div
      class="w-full px-10 my-4 py-6 bg-white rounded-lg shadow-md job-component"
      v-for="(jobs, id) in joblisting"
      :key="id"
    >
      <div class="flex justify-between items-center job-header">
        <span class="font-light text-gray-600">{{ jobs.start_date }}</span>
        <label
          class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded"
          href="#"
          for=""
          >{{ jobs.department }}</label
        >
      </div>
      <div class="mt-2 job-content">
        <a
          class="text-2xl text-gray-700 font-bold hover:text-gray-600"
          href="#"
          >{{ jobs.jobname }}</a
        >
        <p class="mt-2 text-gray-600">{{ jobs.description }}</p>
      </div>
      <div class="flex justify-between items-center mt-4">
        <a class="readmore" href="#">Saiba mais</a>
        <div>
          <h1 class="text-gray-700 font-bold">Remoto</h1>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      joblist: [],
    };
  },
  props: {
    joblisting: {
      type: Array,
      required: true,
    },
  },
  methods: {},
  mounted() {
    this.joblist = this.joblisting;
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/components/joblistingcomponent";
</style>
