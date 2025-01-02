<template>
  <section class="dark:bg-gray-900 create-account">
    <div
      class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 section"
    >
      <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"
      >
        <a
          href="#"
          class="flex items-center m-4 text-2xl justify-center font-semibold text-gray-900 dark:text-white"
        >
          <img
            class="mr-2 logo w-1/2 h-w-1/2"
            src="@/assets/image/logo-sgbr.png"
            alt="logo"
          />
        </a>
        <div class="p-4 space-y-4 md:space-y-6 sm:p-8">
          <h1
            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
          >
            Crie sua conta
          </h1>
          <form class="space-y-4 md:space-y-6" @submit.prevent="getData">
            <div v-if="loginData">
                <label
                  for="email"
                  class="flex mb-2 text-sm font-medium justify-start text-gray-900 dark:text-white"
                  >Login</label
                >
                <input
                  type="email"
                  
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Digite seu email"
                  required=""
                   v-model="this.form.email"
                />
              
              <div>
                <label
                  for="password"
                  class="flex mb-2 text-sm justify-start font-medium text-gray-900 dark:text-white"
                  >Senha</label
                >
                <input
                  type="password"
                  
                  placeholder="••••••••"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required
                   v-model="this.form.password"
                />
              </div>
              <div>
                <label
                  for="retrypassword"
                  class="flex mb-2 text-sm justify-start font-medium text-gray-900 dark:text-white"
                >
                  Repetir Senha
                </label>
                <input
                  type="password"
                  placeholder="••••••••"
                  v-model="retrypassword"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required

                />
                <p v-if="passwordError" class="text-sm text-red-500 mt-1">
                  As senhas não coincidem.
                </p>
              </div>

              <button
                
                type="submit"
                class="w-full bg-slate-500 text-white signin hover:bg-slate-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
              >
                Avançar
              </button>

              <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                Ja tem conta ?
                <a
                  href="/login"
                  class="font-medium text-primary-600 hover:underline dark:text-primary-500"
                  >Faça seu login</a
                >
              </p>
            </div> <!--Acaba aqui-->

            <div v-if="candidateData">
                <label
                  for="full_name"
                  class="flex mb-2 text-sm font-medium justify-start text-gray-900 dark:text-white"
                  >Nome completo</label
                >
                <input
                  type="text"
                  name="email"
                  id="email"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Digite seu nome completo"
                  required
                   v-model="this.form.full_name"
                />
              
              <div>
                <label
                  for="phone"
                  class="flex mb-2 text-sm justify-start font-medium text-gray-900 dark:text-white"
                  >Telefone</label
                >
                <input
                  type="tel"
                  name="phone"
                  id="password"
                  placeholder="Digite seu número de telefone"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required=""
                   v-model="this.form.phone"
                />
              </div>
              <div>
                <label
                  for="additional_info"
                  class="flex mb-2 text-sm justify-start font-medium text-gray-900 dark:text-white"
                >
                  Informações adicioanais
                </label>
                <input
                  type="text"
                  name="additional_info"
                  id="retrypassword"
                  placeholder="Informações adicioanais"
                  v-model="this.form.additional_info"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required=""
                />

                <label
                  for="additional_info"
                  class="flex mb-2 text-sm justify-start font-medium text-gray-900 dark:text-white"
                >
                  Arquivo
                </label>
                <input
                  type="file"
                  name="retrypassword"
                  id="retrypassword"
                  placeholder="Informações adicioanais"
                  @change="handleFileUpload($event)"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required
                />


                <p v-if="passwordError" class="text-sm text-red-500 mt-1">
                  As senhas não coincidem.
                </p>
              </div>

              <button
                type="submit"
                class="w-full bg-slate-500 text-white signin hover:bg-slate-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
              >
                Cadastre-se
              </button>

              <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                Ja tem conta ?
                <a
                  href="/login"
                  class="font-medium text-primary-600 hover:underline dark:text-primary-500"
                  >Faça seu login</a
                >
              </p>
            </div> 

          </form>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import axios from "axios";

export default {
  name: "CreateAccountView",
  data() {
    return {
      form : {
        email: "",
        password: "",
        full_name: "",
        phone: "",
        additional_info: "",
        curriculum: null,
    
      },

      retrypassword: "",      
      passwordError: false,
    
      loginData: true,
      candidateData: false,
      api: process.env.VUE_APP_API_URL,
    };
  },
  methods: {
    handleFileUpload(event) {
      const file = event.target.files[0];
      if (file && file.type === "application/pdf") {
        this.form.curriculum = file;
      } else {
        alert("Por favor, envie um arquivo PDF.");
      }
    },
    
    async getData(){
      
      if(this.form.password !== this.retrypassword){
        this.passwordError = true
        return;

      } else {
          try {
            const credentials = await axios.post(`${this.api}/check`, {
              email: this.form.email

            })

            console.log('Retorno linha 234 credentials', credentials)

            this.passwordError = false
            this.loginData = false
            this.candidateData = true

            const form = new FormData()

            form.append("email", this.form.email);
            form.append("password", this.form.password)
            form.append("full_name", this.form.full_name);
            form.append("phone", this.form.phone);
            form.append("additional_info", this.form.additional_info);
            form.append("curriculum", this.form.curriculum);

            if(this.form.curriculum !== null){
              this.create(form)
            }
          } catch (error) {
            console.log('Erro ao criar a conta:', error)            
          }

      }
    },

    async create(form){
      try {
        const response = await axios.post(
          `${this.api}/candidate`,
          //`http://localhost/api/v1/candidate`,

          form,
          {
            headers: {
              "Content-Type": "multipart/form-data",
                
            },
          }
      );
      if(response.data.success === true)
      {
        console.log('Cadastro feito', response.data)
        //const currentUser = response.data.currentUser
        this.$router.push("/login")
      }
      
      } catch (error) {
        console.error('Erro ao criar o candidato:', error)
      }
      
    }
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/views/createaccountview";
</style>