<template>
  <div
    class="userpage"
    :class="{ activeModalClass: showModal || showModalDelete }"
  >
    <div
      class="grid grid-cols-1 gap-4 p-6 mx-auto bg-white rounded-lg shadow-md"
    >
      <div class="flex items-center justify-between">
        <button
          class="material-icons text-gray-600 hover:text-white px-4 py-2 rounded-md hover:bg-gray-600 shadow-md"
          @click="showModal = true"
        >
          add
        </button>
        <CreateUserForm
          v-if="showModal"
          :show="showModal"
          @close="closeModal()"
          class="activeModalShowClass"
        />
        <DeleteMessage
          v-if="showModalDelete"
          :show="showModalDelete"
          @close="closeModal()"
          :labelText="textDelete"
          :routeText="textRouteDelete"
          class="activeModalShowClass"
        />

        <h2 class="text-2xl font-semibold text-center flex-1">
          Usuários no Sistema
        </h2>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
          <thead class="bg-gray-100 border-b rounded-xl">
            <tr>
              <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
                Nome
              </th>
              <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
                Email
              </th>
              <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
                Status
              </th>

              <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">
                Ações
              </th>
            </tr>
          </thead>
          <tbody v-if="users.length">
            <tr
              v-for="user in users"
              :key="user.id"
              class="border-b text-start"
            >
              <UpdateUserForm
                v-if="showModalUpdate && idUser === user.id"
                :show="showModalUpdate"
                @close="closeModal()"
                :idFromUser="user.id"
                class="openModal"
              />
              <td class="px-4 py-2 text-sm text-gray-700">{{ user.full_name }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ user.email }}</td>
              <td class="px-4 py-2 text-sm text-gray-700"> {{ user.active === 1 ? "Ativo": "Desativado" }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">
                <button
                  class="material-icons text-red-600 hover:text-red-800 pr-4 border-none outline-none"
                  @click="deleteUser(user.id)"
                >
                  delete
                </button>
                <button
                  class="material-icons text-blue-600 hover:text-blue-800 pr-4 border-none outline-none"
                  @click="updateUser(user.id)"
                >
                  edit
                </button>
              </td>
            </tr>
          </tbody>
          <div
            v-else
            class="text-center p-4 w-full flex justify-center font-bold text-gray-600"
          >
            Nenhum usuário encontrado.
          </div>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import DeleteMessage from "@/components/DeleteMessage.vue";
import CreateUserForm from "./Forms/CreateUserForm.vue";
import axios from "axios";
import UpdateUserForm from "./Forms/UpdateUserForm.vue";

export default {
  name: "UserManagement",
  data() {
    return {
      users: [],
      showModal: false,
      showModalDelete: false,
      showModalUpdate: false,
      textDelete: "",
      idUser: "",
      textRouteDelete: "",
      api: process.env.VUE_APP_API_URL,
    };
  },
  methods: {
    closeModal() {
      this.showModalUpdate = false;
      this.showModal = false;
      this.showModalDelete = false;
      this.getAllUsers();
    },
    deleteUser(id) {
      this.showModalDelete = true;
      this.textDelete = "Deseja excluir este usuário?";
      this.textRouteDelete = `${this.api}/admin/user/${id}`;
    },
    updateUser(id) {
      this.showModalUpdate = true;
      this.idUser = id;
      //this.getAllUsers();
    },

    async getAllUsers() {
      axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('authToken')}`;

      try {
        const response = await axios.get(`${this.api}/admin/users`);
        this.users = response.data.all;
        
      } catch (error) {
        if(error.response.status === 401 && error.response.status !== 200)
        { 
          this.$router.push({
            path: "/login",
            query:  { message: `Acesso negado, faça login para prosseguir` }

          })

        }
      }
    },
  },
  mounted() {
    this.getAllUsers();
  },
  components: {
    CreateUserForm,
    DeleteMessage,
    UpdateUserForm,
  },
};
</script>

<style  lang="scss" scoped>
@import "@/assets/scss/admin/pages/userpage";
</style>