 <template>
  <div
    class="joblist-table p-5"
    :class="{
      activeModalClass:
        showModalCreate || showModalUpdate || showModalView || showModalDelete,
    }"
  >
    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
      <button
        class="material-icons text-gray-600 hover:text-white px-4 py-2 rounded-md hover:bg-gray-600 shadow-md"
        @click="showModalCreate = true"
      >
        add
      </button>
      <CreateJobForm
        v-if="showModalCreate"
        :show="showModalCreate"
        @close="closeModal()"
        class="activeModalShowClass"
        
      />

    </div>

    <div
      id="joblist-table"
      class="bg-white shadow-md rounded-lg overflow-hidden"
    >
      <div
        id="joblist-table-heading"
        class="flex text-sm font-semibold bg-gray-200 text-gray-700 p-4"
      >
        <div class="w-1/5">Vaga</div>
        <div class="w-2/5">Descrição</div>
        <div class="w-1/5">Categoria</div>
        <div class="w-1/5">Status</div>
        <div class="w-1/5 text-center">Ações</div>
      </div>

      <div id="joblist-table-rows" class="divide-y" v-if="joblist.length > 0">
        <div
          class="joblist-table-row flex items-center p-4 text-gray-600 hover:bg-gray-100 transition"
          v-for="(job, id) in filteredJobs"
          :key="id"
        >
        
          <UpdateOrViewJobForm
            v-if="showModalUpdate"
            :show="showModalUpdate"
            @close="closeModal()"
            :idJobListing="isIdForJob"
            :isUpdate="isUpdate"
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

          <ViewJob
            v-if="showModalView"
            :show="showModalView"
            @close="closeModal()"
            :idJobListing="isIdForJob"
            
            class="activeModalShowClass"
          />
          <div class="w-1/5 truncate">
            {{ job.name }}
          </div>
          <div class="w-2/5 truncate">
            {{ stringLimit(job.description, 40) }}
          </div>
          <div class="w-1/5 truncate">
            {{ job.departament }}
          </div>
          <div class="w-1/5 truncate">
            {{ job.active === 1 ? 'Vaga desativada' : job.status }}
          </div>
          <div class="w-1/5 flex justify-center space-x-2">
            <button
              class="material-icons text-red-600 hover:text-red-800 border-none outline-none"
              @click="deleteJob(job.id, job.name)"
            >
              delete
            </button>
            <button
              class="material-icons text-blue-600 hover:text-blue-800 border-none outline-none"
              @click="editJob(job.id)"
            >
              edit
            </button>

            <button
              class="material-icons text-gray-600 hover:text-gray-800 border-none outline-none"
              @click="openJobView(job.id)"
            >
              visibility
            </button>
            
            <button
              class="material-icons text-gray-600 hover:text-gray-800 border-none outline-none"
              @click="getCandidates(job.id)"
            >
              lists
            </button>
          </div>
        </div>
      </div>
      <div v-else class="flex justify-center text-bold p-4">
        Nenhum resultado encontrado
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import CreateJobForm from "./Forms/CreateJobForm.vue";
import UpdateOrViewJobForm from "./Forms/UpdateOrViewJobForm.vue";
import DeleteMessage from "@/components/DeleteMessage.vue";
import ViewJob from "./ViewJob.vue";

export default {
  name: "JobListComponent",
  data() {
    return {
      joblist: [],
      status: [],
      searchText: "",
      selectedCategory: "",
      api: process.env.VUE_APP_API_URL,
      showModalCreate: false,
      showModalUpdate: false,
      showModalView: false,
      showModalDelete: false,
      isUpdate: false,
      form: {},
      textDelete: "Deseja excluir esta vaga?",
      textRouteDelete: "",
      
      isIdForJob: "",
    };
  },
  computed: {
    filteredJobs() {
      return this.joblist.filter((job) => {
        const matchesText = job.name
          .toLowerCase()
          .includes(this.searchText.toLowerCase());
        const matchesCategory =
          !this.selectedCategory ||
          job.status.toLowerCase() === this.selectedCategory.toLowerCase();
        return matchesText && matchesCategory;
      });
    },
    getJob() {
      return (id) => this.joblist.find((job) => job.id === id);
    },
  },
  methods: {
    async getJobs() {
      axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('authToken')}`;

      try {
        const response = await axios.get(`${this.api}/admin/jobs`);        
        this.joblist = response.data
        
      } catch (error) {
        if(error.response.status === 401 && error.response.status !== 200)
        { 
          this.$router.push({
            path: "/login",
            query:  { message: `Acesso negado, faça login para prosseguir ${error.response.status}` }
          })

        }

      }
    },
    stringLimit(text, limit) {
      return text.length > limit ? `${text.substring(0, limit)}...` : text;
    },
    async deleteJob(id, name) {
      try {
        this.showModalDelete = true;
        this.textDelete = `Deseja excluir a vaga de "${name}"?`;
        const response = axios.delete(`${this.api}/admin/job/${id}`);

        console.log('VAGA DELETADA:', response)
      } catch (error) {
        console.error("Erro ao deletar vaga:", error);
      }
    },
    editJob(id) {
      this.isIdForJob = String(id);
      this.showModalUpdate = true;
      this.isUpdate = true;
      this.form = this.getJob(id);
    },
    openJobView(id) {
      this.isIdForJob = String(id);
      this.isUpdate = false;
      this.showModalView = true;
    },
    closeModal() {
      this.showModalUpdate = false;
      this.showModalCreate = false;
      this.showModalDelete = false;
      this.showModalView = false;
      this.getJobs();
    },
    getCandidates(id) {
      this.$router.push({ name: "candidatestojob", params: { id: id } });
    },
  },
  mounted() {
    this.getJobs();
  },
  components: {
    CreateJobForm,
    UpdateOrViewJobForm,
    DeleteMessage,
    ViewJob
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/admin/pages/joblistpage";
</style>
