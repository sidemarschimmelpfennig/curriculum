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
                id="password"
                v-model="form.password"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="••••••••"
                required
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
                  style="margin: 0 0 5px 0;"
                />
                <p 
                  v-if="messagePassword"
                  class="text-sm text-red-500 mt-1"
                  style="margin: 0 0 5px 0;"
                >
                   {{ messagePassword }}

                </p>

                <p 
                  v-if="isLoanding"
                  class="text-sm text-white mt-1"
                  style="margin: 0 0 5px 0;"
                >
                   {{ isLoanding }}

                </p>
              </div>

              <button
                style="margin: 10px 0 0 0;"
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

                <label
                  for="full_name"
                  class="flex mb-2 text-sm font-medium justify-start text-gray-900 dark:text-white"
                  >CPF</label
                >
                <input
                  type="text"
                  name="email"
                  id="email"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Digite seu nome completo"
                  required
                   v-model="this.form.cpf"
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
                  id="phone"
                  placeholder="Digite seu número de telefone"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required
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
                  
                />

                <label
                  for="curriculum"
                  class="flex mb-2 text-sm justify-start font-medium mt-2 dark:text-white"
                >
                  Arquivo
                </label>
                <label>
                  <input 
                    type="file"
                    hidden 
                    id="curriculum"
                    name="curriculum"
                    @change="handleFileUpload($event)"
                    required
                  />
                  <div class="flex w-32 max-w-28 h-11 px-2 flex-col bg-gray-700 rounded-full shadow text-white text-xs mt-0 my-5 font-semibold leading-4 items-center justify-center cursor-pointer focus:outline-none">Escolha seu arquivo aqui</div>
                </label>
                <div>
                  <select 
                    v-model="form.gender"
                    class="flex w-24 h-7 px-2 bg-gray-700 rounded-full shadow text-white text-xs mt-0 my-5 font-semibold "
                  >
                    <option value="" selected disabled>Gênero</option>
                    <option :value="'F'">Feminino</option>
                    <option :value="'M'">Masculino</option>
                    <option :value="'O'">Outro</option>
                  </select>
                </div>
                <p 
                  v-if="message"
                  class="text-sm text-red-500 mt-1">
                  {{ message }}
                  
                </p>

                <p 
                  v-if="isLoanding"
                  class="text-sm text-white mt-1"
                  style="margin: 0 0 5px 0;"
                >
                   {{ isLoanding }}

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
        cpf: "",
        phone: "",
        additional_info: "",
        gender: "",
        curriculum: "",
    
      },
      message: "",
      isLoanding: "",
      messagePassword: "",

      retrypassword: "",      
      loginData: true, 
      candidateData: false,
      api: process.env.VUE_APP_API_URL,
    };
  },
  methods: {
    handleFileUpload(event) {
      const file = event.target.files[0];
      if (file && file.type === "application/pdf" || file.type === "application/msword" || file.type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
        this.form.curriculum = file;
      } else {
        this.message = "Por favor, envie um arquivo PDF/Docx/Doc.";

      }
    },
    
    async getData(){
      
      if(this.form.password !== this.retrypassword){
        this.messagePassword = "As senhas não coincidem."
        return;

      } else {
          try {
            this.isLoanding = 'Verificando dados...'
            const checkEmail = await axios.post(`${this.api}/checkEmail`, {
              email: this.form.email,

            })

            if(checkEmail.data.message === 'Esse e-mail já está cadastrado'){
              this.messagePassword = checkEmail.data.message              
              this.form.email = ''
              this.form.password = ''
              this.retrypassword = ''
              this.isLoanding = ''

            } else {
              this.isLoanding = ''
              this.loginData = false
              this.candidateData = true
              
              this.passwordError = false

              const form = new FormData()

              form.append("email", this.form.email);
              form.append("password", this.form.password)
              form.append("full_name", this.form.full_name);
              form.append("cpf", this.form.cpf);
              form.append("phone", this.form.phone);
              form.append("additional_info", this.form.additional_info);
              form.append("gender", this.form.gender);
              form.append("curriculum", this.form.curriculum);

              if(this.form.cpf)
              {
                const checkCPF = await axios.post(`${this.api}/checkCPF`, {
                cpf: this.form.cpf

                })
                
                if(checkCPF.data.message !== 'Esse CPF já está cadastrado' && this.form.curriculum !== null)
                {
                  this.message = ''
                  this.create(form)
                } 

                this.message = checkCPF.data.message

              }
            }
            
          } catch (error) {
            console.error('Erro ao criar a conta:') 
            console.error('Message:', error) 
    
          }
      }
    },

    async create(form){
      try {

        this.isLoanding = 'Sua conta está sendo criada ...'
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
      this.isLoanding = ''
      
      if(response.data.success === true)
      {
        this.$router.push("/login")

      }
      
      } catch (error) {
        this.isLoanding = ''
        this.message = 'Algo deu errado!'
        console.log(error)
        if(error.response.data.code === "22001")
        {
          this.message = 'Um ou mais campos excederam o limite de tamanho'
        }
      }
      
    }
  },
};
</script>
<style lang="scss" scoped>
  @import "@/assets/scss/views/createaccountview";

</style>