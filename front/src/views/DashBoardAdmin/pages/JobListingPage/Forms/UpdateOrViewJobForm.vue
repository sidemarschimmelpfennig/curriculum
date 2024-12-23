<template>
  <!-- <div class="mx-auto p-6 bg-white shadow-md rounded-lg showModalComponent">
    <div class="text-xl font-semibold text-center flex">
      <h2 class="text-2xl font-semibold mb-4 pr-48 pl-5 justify-start">
        {{ isUpdate ? "Atualizar vaga" : form.name }}
      </h2>
      <span
        class="material-icons text-white bold pl-8 hover:text-red-600 hover:cursor-pointer"
        @click="closeModal"
        >close</span
      >
    </div>

    <form class="formModalComponent" @submit.prevent="submitForm">
      <div class="flex flex-col space-y-2" v-if="isUpdate">
        <label for="name" class="text-sm font-medium text-gray-700 text-start"
          >Nome da vaga</label
        >
        <input
          :readonly="!isUpdate"
          type="text"
          id="name"
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
          :disabled="!isUpdate"
          id="description"
          v-model="form.description"
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Descreva a vaga aqui"
        ></textarea>
      </div>

      <div class="flex flex-col space-y-2">
        <label for="category" class="text-sm font-medium text-gray-700"
          >Categorias a:</label
        >
        <select
          id="category"
          v-model="form.departament_categories"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          <option option value="" disabled selected>Padrão</option>
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
        <label for="mobility" class="text-sm font-medium text-gray-700"
          >Modalidade de trabalho</label
        >
        <select
          :disabled="!isUpdate"
          v-model="form.mobilities"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          <option :value="form.mobilities">{{ form.mobilities }}</option>
          <option
            v-for="mobility in mobilities_array"
            :key="mobility.name"
            :value="mobility.id"
          >
            {{ mobility.name }}
          </option>
        </select>
      </div>
      
      <div class="flex flex-col space-y-2">
        <label for="skills" class="text-sm font-medium text-gray-700 text-start"
          >Requisitos</label
        >
        <input
          :disabled="!isUpdate"
          type="text"
          id="name"
          v-model="form.skills"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        />
      </div>


      <div class="flex flex-col space-y-2">
        <label for="skills" class="text-sm font-medium text-gray-700 text-start"
          >Status :</label
        >
        <select
          id="mobilities"
          v-model="form.status"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
        <option option value="" disabled selected>Padrão</option>
          <option
            v-for="(status, id) in status_array"
            :value="status.id"
            :key="status.id"
          >
            {{ status.status }}
          </option>
        </select>
      </div>


      <button
        v-if="isUpdate"
        type="submit"
        class="py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition mt-4"
      >
        {{ "Atualizar" }}
      </button>
    </form>
  </div> -->

  <div class="mx-auto p-6 bg-white shadow-md rounded-lg showModalComponent">
    <div class="text-xl font-semibold text-center flex">
      <h2 class="text-2xl font-semibold mb-4 pr-48 pl-5">
        Alterar vaga
        
      </h2>
      <span
        class="material-icons text-white bold pl-8 hover:text-red-600 hover:cursor-pointer"
        @click="closeModal"
        >close</span
      >
    </div>

    <form class="formModalComponent" @submit.prevent="updateJob">
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
        <label for="skills" class="text-sm font-medium text-gray-700 text-start"
          >Status :</label
        >
        <select
          id="mobilities"
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
            {{ status.status }}
          </option>
        </select>
      </div>

      <button
        type="submit"
        class="py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition mt-4"
      >
        Alterar vaga
      </button>
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
      },
      departments: [],
      departments_categories: [],
      mobilities_array: [],
      skills_array: [],
      status_array: [],
      api: process.env.VUE_APP_API_URL,
    };

  },
  watch: {
    editJob: {
      handler(newValue){
        if(newValue)
        {
          this.name = newValue.name,
          this.description = newValue.description,
          this.department = newValue.department,
          this.departament_category = newValue.departament_category,
          this.status = newValue.status,
          this.skills = newValue.skills,
          this.mobilities = newValue.mobilities

        }
      },
      immediate: true,
      deep: true
    }
  }, 

  methods: {
    closeModal() {
      this.$emit("close");
    },
    submitForm() {},
    async updateJob() {
      try {
        console.log('VAGA SENDO ALTERADA:', this.idJobListing)
        const data = {
          name: this.form.name,
          description: this.form.description,
          departament_id: this.form.departament, // ID do departamento
          departament_categories_id: this.form.departament_category, // ID da categoria
          status_id: this.form.status, // ID do status
          skills_id: this.form.skills, // ID das habilidades
          mobilities_id: this.form.mobilities, // ID da modalidade de trabalho

        }

        const response = await axios.put(`${this.api}/admin/job/${this.idJobListing}`, data);

        console.log("Vaga atualizada:", response);
        this.closeModal();
      } catch (error) {
        console.error("Erro ao atualizar vaga:", error);
      }
    },

    async getJob() {
      try {
        const response = await axios.get(
          `${this.api}/admin/jobBy/${this.idJobListing}`
        );
        const jobData = response.data;

        this.form = {
          name: jobData.name,
          description: jobData.description,
          departament: jobData.departament_id, // ID do departamento
          departament_category: jobData.departament_categories_id, // ID da categoria
          status: jobData.status_id, // ID do status
          skills: jobData.skills_id, // ID das habilidades
          mobilities: jobData.mobilities_id, // ID da modalidade de trabalho
        };
      } catch (error) {
        console.error("Erro ao buscar vaga:", error);
      }
    },

    async getData()
    {
      try {
        const response = await axios.get(`${this.api}/admin/departament`);
        this.departments = response.data
      
      } catch (error) {
        console.error("Erro ao enviar capturar os departamentos:", error);
      }

      try {
        const response = await axios.get(`${this.api}/admin/categorys`);
        this.departments_categories = response.data
        
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
    isUpdate: {
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

