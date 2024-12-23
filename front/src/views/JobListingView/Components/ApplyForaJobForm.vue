<template>
  <div class="mx-auto p-6 bg-white shadow-md rounded-lg applyforajob">
    <div class="text-xl font-semibold text-center flex">
      <h2 class="text-2xl font-semibold mb-4 pr-48 pl-5">
        Cadastre seu Currículo
      </h2>
      <span
        class="material-icons text-white bold pl-8 hover:text-red-600 hover:cursor-pointer"
        @click="closeModal"
        >close</span
      >
    </div>
    <form @submit.prevent="submitForm">
      <div class="flex flex-col space-y-2">
        <label
          for="full_name"
          class="text-sm font-medium text-gray-700 text-start"
          >Nome Completo</label
        >
        <input
          type="text"
          id="full_name"
          v-model="form.full_name"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        />
      </div>

      <div class="flex flex-col space-y-2">
        <label for="email" class="text-sm font-medium text-gray-700"
          >Email</label
        >
        <input
          type="email"
          id="email"
          v-model="form.email"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        />
      </div>
      <div class="flex flex-col space-y-2">
        <label for="phone" class="text-sm font-medium text-gray-700"
          >Telefone</label
        >
        <input
          type="tel"
          id="phone"
          v-model="form.phone"
          required
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
        />
      </div>
      <div class="flex flex-col space-y-2 h-40">
        <label
          for="additional_info"
          class="text-sm font-medium text-gray-700 text-start"
          >Informações Adicionais</label
        >
        <textarea
          id="additional_info"
          v-model="form.additional_info"
          class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Digite informações adicionais aqui..."
        ></textarea>
      </div>
      <div class="flex flex-col space-y-2">
        <label
          for="curriculum"
          class="text-sm font-medium text-gray-700 text-start"
          >Currículo</label
        >
        <input
          type="file"
          id="file"
          @change="handleFileUpload($event)"
          accept=".pdf"
          required
          class="flex-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 py-2 px-3 text-sm"
          placeholder="Escolha um arquivo"
        />
      </div>

      <button
        type="submit"
        class="py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition mt-4"
      >
        Candidatar-se
      </button>
    </form>
  </div>
</template>

<script>
import axios from '@/axios.js';

export default {
  data() {
    return {
      form: {
        full_name: "",
        email: "",
        phone: "",
        additional_info: "",
        status: 1,
        jobID: this.jobID, 
        file: null,
      },
      api: process.env.VUE_APP_API_URL,
    };
  },
  methods: {
    handleFileUpload(event) {
      const file = event.target.files[0];
      if (file && file.type === "application/pdf") {
        this.form.file = file;
      } else {
        alert("Por favor, envie um arquivo PDF.");
      }
    },
    async submitForm() {
      try {
        const form = new FormData();

        form.append("full_name", this.form.full_name);
        form.append("email", this.form.email);
        form.append("phone", this.form.phone);
        form.append("additional_info", this.form.additional_info);
        form.append("status", this.form.status);
        form.append("jobID", this.form.jobID); 

        form.append("curriculum", this.form.file);
        const response = await axios.post(
          `${this.api}/candidate`,
          form,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );

        console.log(response.data);
        this.closeModal()
      } catch (error) {
        console.error("Erro ao enviar o formulário:", error);
        alert("Erro ao enviar o formulário. Por favor, tente novamente.");
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
    jobID: {
      type: String,
      required: true,
    },
  },
  mounted() {
    window.addEventListener("keydown", this.handleKeydown);
  },
  beforeUnmount() {
    window.removeEventListener("keydown", this.handleKeydown);
  },
};
</script>
