<template>
      <div class="mx-auto p-6 bg-white shadow-md rounded-lg showModalComponent">
    <div class="text-xl font-semibold text-center flex">
      <h2 class="text-2xl font-semibold mb-4 pr-48 pl-5">
        Visualizar Vaga
        
      </h2>
      <span
        class="material-icons text-white bold pl-8 hover:text-red-600 hover:cursor-pointer"
        @click="closeModal"
        >close</span
      >
    </div>

    <form class="formModalComponent">
      <div class="flex flex-col space-y-2">
        <label
          for="jobname"
          class="text-sm font-medium text-gray-700 text-start"
          >Nome da vaga</label
        >
        <input
          type="text"
          id="jobname"
          v-model="form.name"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        />
      </div>
      <div class="flex flex-col space-y-2 h-40">
        <label
          for="description"
          class="text-sm font-medium text-gray-700 text-start"
          >Descrição</label
        >
        <textarea
          id="description"
          v-model="form.description"
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Descreva a vaga aqui"
        ></textarea>
      </div>
      <div class="flex flex-col space-y-2">
        <label for="category" class="text-sm font-medium text-gray-700"
          >Setor :</label
        >
        <select
          id="category"
          v-model="form.departament"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
        <option option value="" disabled selected>Padrão</option>
          <option
            v-for="(department, id) in departments"
            :key="id"
            :value="department.id"
          >
            {{ department.departament }}
          </option>
        </select>
      </div>

      <div class="flex flex-col space-y-2">
        <label for="category" class="text-sm font-medium text-gray-700"
          >Categorias a:</label
        >
        <select
          id="category"
          v-model="form.departament_category"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          <option option value="" disabled selected>Padrão</option>
          <option
            v-for="(departament_category, id) in departments_categories"
            :key="id"
            :value="departament_category.id"
          >
            {{ departament_category.departament_category }}
          </option>
        </select>
      </div>

      <div class="flex flex-col space-y-2">
        <label for="mobilities" class="text-sm font-medium text-gray-700"
          >Modelo de trabalho :</label
        >
        <select
          id="mobilities"
          v-model="form.mobilities"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
        <option option value="" disabled selected>Padrão</option>
          <option
            v-for="mobilities in mobilities_array"
            :value="mobilities.id"
            :key="mobilities.id"
          >
            {{ mobilities.mobilities }}
          </option>
        </select>
      </div>

      <div class="flex flex-col space-y-2">
        <label for="skills" class="text-sm font-medium text-gray-700 text-start"
          >Requisitos :</label
        >
        <select
          id="mobilities"
          v-model="form.skills"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
        <option option value="" disabled selected>Padrão</option>
          <option
            v-for="skills in skills_array"
            :value="skills.id"
            :key="skills.id"
          >
            {{ skills.skills }}
          </option>
        </select>
      </div>

      <div class="flex flex-col space-y-2">
        <label for="status" class="text-sm font-medium text-gray-700 text-start"
          >Status :</label
        >
        <select
          id="status"
          v-model="form.status"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
        <option option value="" disabled selected>Padrão</option>
          <option
            v-for="status in status_array"
            :value="status.id"
            :key="status.id"
          >
            {{ form.active === 1 ? status.status : 'Vaga desativada' }}
          </option>
        </select>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
//import data from "@/assets/data.json";
export default {
  data() {
    return {
      form: {
        name: null,
        description: null,
        department: null,
        departament_category: null,
        status: null,
        skills: null,
        mobilities: null,
        active: null
      },
      departments: [],
      departments_categories: [],
      mobilities_array: [],
      skills_array: [],
      status_array: [],
      api: process.env.VUE_APP_API_URL,
    };

  }, 

  methods: {
    closeModal() {
      this.$emit("close");
    },
    submitForm() {},

    async getJob() {
      try {
        const response = await axios.get(
          `${this.api}/admin/jobBy/${this.idJobListing}`
        );
        const jobData = response.data;

        this.form = {
          name: jobData.name,
          description: jobData.description,
          departament: jobData.departament_id,
          departament_category: jobData.departament_categories_id,
          status: jobData.status_id, 
          skills: jobData.skills_id, 
          mobilities: jobData.mobilities_id,
          active: jobData.active
        };
      } catch (error) {
        console.error("Erro ao buscar vaga:", error);
      }
    },

    async getData()
    {
      try {
        const response = await axios.get(`${this.api}/admin/departament`);
        this.departments = response.data.all
      
      } catch (error) {
        console.error("Erro ao enviar capturar os departamentos:", error);
      }

      try {
        const response = await axios.get(`${this.api}/admin/categorys`);
        this.departments_categories = response.data.all
        
      } catch (error) {
        console.error("Erro ao enviar capturar as categorias:", error);

      }

      try {
        const response = await axios.get(`${this.api}/admin/skills`);
        this.skills_array = response.data
        
      } catch (error) {
        console.error("Erro ao enviar capturar as habilidades:", error);

      }

      try {
        const response = await axios.get(`${this.api}/admin/mobilites`);
        this.mobilities_array = response.data
        
      } catch (error) {
        console.error("Erro ao enviar capturar as mobiliaddes:", error);

      }

      try {
        const response = await axios.get(`${this.api}/admin/status`);
        this.status_array = response.data
        
      } catch (error) {
        console.error("Erro ao enviar capturar as status:", error);

      }
    },

    handleKeydown(event) {
      if (event.key === "Escape") {
        this.closeModal();
      }
    },
  },
  props: {
    show: {
      type: Boolean,
      required: true,
    },
    
    idJobListing: {
      type: String,
      required: true,
    },
  },
  mounted() {
    window.addEventListener("keydown", this.handleKeydown);
    this.getJob();
    this.getData();

  },
  beforeUnmount() {
    window.removeEventListener("keydown", this.handleKeydown);
  },
};
</script>

<style scoped lang="scss">
@import "@/assets/scss/main";
</style>