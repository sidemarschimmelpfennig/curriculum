<template>
  <div
    class="grid grid-cols-1 gap-4 p-6 max-w-3xl mx-auto bg-white rounded-lg shadow-md"
  >
    <h2 class="text-2xl font-semibold text-center">Usuários no Sistema</h2>

    <!-- Lista de usuários existentes -->
    <div v-if="users.length" class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead class="bg-gray-100 border-b">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
              Email
            </th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
              Nível
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id" class="border-b">
            <td class="px-4 py-2 text-sm text-gray-700">{{ user.email }}</td>
            <td class="px-4 py-2 text-sm text-gray-700">
              {{
                user.is_admin === 0
                  ? "Usuário não administrador"
                  : "Administrador"
              }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-else class="text-center text-gray-600">
      Nenhum usuário encontrado.
    </div>

    <!-- Formulário para adicionar novo usuário -->
    <div class="mt-6">
      <h3 class="text-xl font-semibold text-center">Adicionar Novo Usuário</h3>

      <div class="mt-4">
        <label for="email" class="block text-sm font-medium text-gray-700"
          >Email</label
        >
        <input
          type="email"
          id="email"
          v-model="form.email"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
          placeholder="Digite o email"
        />
      </div>

      <div class="mt-4">
        <label for="password" class="block text-sm font-medium text-gray-700"
          >Senha</label
        >
        <input
          type="password"
          id="password"
          v-model="form.password"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
          placeholder="Digite a senha"
        />
      </div>

      <div class="mt-4">
        <label for="is_admin" class="block text-sm font-medium text-gray-700"
          >Nível</label
        >
        <select
          id="is_admin"
          v-model="form.is_admin"
          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        >
          <option value="0">Usuário não administrador</option>
          <option value="1">Administrador</option>
        </select>
      </div>

      <button
        @click="submitForm"
        class="w-full py-2 px-4 mt-4 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
      >
        Salvar
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "UserManagement",
  data() {
    return {
      users: [
        {
          email: "sidemarschi@gmail.com",
          password: "1123",
          is_admin: "0", // Defau
        },
      ], // Lista de usuários existentes
      form: {
        email: "",
        password: "",
        is_admin: "0", // Default para usuário não administrador
      },
    };
  },
  methods: {
    async fetchUsers() {
      try {
        const response = await fetch("http://localhost:8000/api/users");
        if (!response.ok) {
          throw new Error("Erro ao buscar usuários.");
        }
        this.users = await response.json();
      } catch (error) {
        alert(error.message);
      }
    },
    async submitForm() {
      try {
        const response = await fetch("http://localhost:8000/api/users", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(this.form),
        });
        if (!response.ok) {
          throw new Error("Erro ao salvar os dados.");
        }
        alert("Usuário cadastrado com sucesso!");
        this.fetchUsers(); // Atualiza a lista de usuários
        this.resetForm();
      } catch (error) {
        alert(error.message);
      }
    },
    resetForm() {
      this.form = {
        email: "",
        password: "",
        is_admin: "0",
      };
    },
  },
  mounted() {
    this.fetchUsers();
  },
};
</script>

<style  lang="scss" scoped>
/* Estilização personalizada se necessário */
</style>