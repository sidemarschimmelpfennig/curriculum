<template>
  <div class="mx-auto p-6 bg-white shadow-md rounded-lg showModalComponent">
    <div class="text-xl font-semibold text-center flex">
      <h2 class="text-2xl font-semibold mb-4 pr-48 pl-5">
        Cadastre uma nova vaga
      </h2>
      <span
        class="material-icons text-white bold pl-8 hover:text-red-600 hover:cursor-pointer"
        @click="closeModal"
        >close</span
      >
    </div>

    <form class="formModalComponent" @submit.prevent="submitForm">
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
          >Setor:</label
        >
        <select
          id="category"
          v-model="form.departament"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
        
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
          >Categorias:</label
        >
        <select
          id="category"
          v-model="form.departament_categories"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          
          <option
            v-for="(category, id) in departments_categories"
            :key="id"
            :value="category.id"
          >
            {{ category.departament_category }}
          </option>
        </select>
      </div>

      <div class="flex flex-col space-y-2">
        <label for="mobilities" class="text-sm font-medium text-gray-700"
          >Modelo de trabalho:</label
        >
        <select
          id="mobilities"
          v-model="form.mobilities"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
        
          <option
            v-for="mobilities in mobilities_array"
            :value="mobilities.id"
            :key="mobilities.id"
          >
            {{ mobilities.mobilities }}
          </option>
        </select>
      </div>

      <div class="flex flex-col space-y-2 h-40">
        <label
          for="description"
          class="text-sm font-medium text-gray-700 text-start"
          >Requisitos</label
        >
        <textarea
          id="description"
          v-model="form.skills"
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Descreva a vaga aqui"
        ></textarea>
      </div>

      <button
        type="submit"
        class="py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition mt-4"
      >
        Criar nova vaga
      </button>
    </form>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      form: {
        name: null,
        description: null,
        departament: null,
        departament_categories: null,
        skills: null,
        mobilities: null
     
      },
      departments: [],
      departments_categories: [],
      mobilities_array: [],
      api: process.env.VUE_APP_API_URL,
    };
  },
  methods: {
    async submitForm() {
      try {
        const jobData = {
          name: this.form.name,
          description: this.form.description,
          departament_id: this.form.departament,
          departament_categories_id: this.form.departament_categories,
          status_id: 1,
          skills: this.form.skills,
          mobilities_id: this.form.mobilities,
        
        };

        console.log('DADOS PARA ENVIO:' , jobData)
        const response = await axios.post(`${this.api}/admin/job`, jobData);
        
        console.log("Nova vaga cadastrada com sucesso!", response.data);
        this.closeModal();
      } catch (error) {
        console.error("Erro ao enviar o formulário:", error);
        alert("Erro ao enviar o formulário. Por favor, tente novamente.");
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

    closeModal() {
      this.$emit("close");
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
   
  },
  mounted() {
    window.addEventListener("keydown", this.handleKeydown);
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
