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
          >Setor :</label
        >
        <select
          id="category"
          v-model="form.departament"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          <option value="Padrão" selected>Padrão</option>
          <option
            v-for="(department, id) in departments"
            :key="id"
            :value="department.departament"
          >
            {{ department.departament }}
          </option>
        </select>
      </div>

      <div class="flex flex-col space-y-2">
        <label for="category" class="text-sm font-medium text-gray-700"
          >Categorias :</label
        >
        <select
          id="category"
          v-model="form.departament_categories"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          <option selected :value="form.departament_categories">Padrão</option>
          <option
            v-for="departament in departments_categories"
            :key="departament.id"
            :value="departament.departament_categorie"
          >
            {{ departament.departament_categorie }}
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
          <option
            v-for="mobility in mobilities_array"
            :value="mobility.mobilities"
            :key="mobility.mobilities"
          >
            {{ mobility.mobilities }}
          </option>
        </select>
      </div>

      <div class="flex flex-col space-y-2">
        <label for="skills" class="text-sm font-medium text-gray-700 text-start"
          >Requisitos :</label
        >
        <input
          type="text"
          id="skills"
          v-model="form.skills"
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Digite as habilidades separadas por vírgula"
        />
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
        name: "",
        description: "",
        departament: "Padrão",
        departament_categories: "Padrão",
        status: "Aberta",
        skills: "",
        mobilities: "Presencial",
        active: 1,
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
          departament: this.form.departament,
          departament_categories: this.form.departament_categories,
          status: this.form.status,
          skills: this.form.skills.split(",").map((skill) => skill.trim()),
          mobilities: this.form.mobilities,
          active: this.form.active,
        };

        const response = await axios.post(`${this.api}/admin/job`, jobData);
        console.log7(response);
        console.log("Nova vaga cadastrada com sucesso!");
        this.closeModal();
      } catch (error) {
        console.error("Erro ao enviar o formulário:", error);
        alert("Erro ao enviar o formulário. Por favor, tente novamente.");
      }
    },
    async getTypeStatus() {
      try {
        try {
          let response = await axios.get(`${this.api}/admin/departament`);
          if (response.status === 200) {
            if (response.data && response.data.departaments.length > 0) {
              this.departments = response.data.departaments;
            } else {
              this.departments = [];
            }
          }
        } catch (error) {
          console.error(error);
          this.departments = [];
        }
        try {
          let response = await axios.get(`${this.api}/admin/mobilites`);
          console.log(response);
          if (response.status === 200) {
            if (response.data && response.data.length > 0) {
              this.mobilities_array = response.data;
              console.log(this.mobilities_array);
            } else {
              this.mobilities_array = [];
            }
          }
        } catch (error) {
          console.error(error);
          this.mobilities_array = [];
        }
        try {
          let response = await axios.get(`${this.api}/admin/categorys`);
          if (response.status === 200) {
            if (
              response.data.departaments &&
              response.data.departaments.length > 0
            ) {
              this.departments_categories = response.data.departaments;
            } else {
              this.departments_categories = [];
            }
          }
        } catch (error) {
          console.error(error);
          this.departments_categories = [];
        }
      } catch (error) {
        console.error(error);
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
    mobilities: {
      type: Array,
      required: true,
    },
  },
  mounted() {
    window.addEventListener("keydown", this.handleKeydown);
    this.getTypeStatus();
  },
  beforeUnmount() {
    window.removeEventListener("keydown", this.handleKeydown);
  },
};
</script>
<style scoped lang="scss">
@import "@/assets/scss/main";
</style>
