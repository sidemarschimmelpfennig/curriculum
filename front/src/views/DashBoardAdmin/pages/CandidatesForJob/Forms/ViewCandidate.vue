<template>
    <h1>Editar Status do candidato</h1>
    
    <form
        @submit.prevent="updateStatus()"
        
    >
        <div>
            Status atual: {{ candidateStatus }}
        </div>    
            <label for="status_">Novo status</label>
            <select 
                v-model="status_"
                required
                class="flex-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >

                <option value="Selecione um status" disabled selected>Selecione um status</option> 

                <option
                    v-for="status in statuss"
                    :key="status.id"
                    :value="status.status"

                >
                {{ status.status }}

                </option>

            </select>
            <br>
        
        <button 
            class="border border-gray-300 p-2 rounded-md"
            type="submit"
            
        >
            Alterer Status
        </button>

        <div v-if="isLoanding"> {{ isLoanding }} </div>
    </form>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "ViewCandidate",
        data(){
            return {
                candidateStatus: null,
                statuss: [],
                status_: 'Selecione um status',
                api: process.env.VUE_APP_API_URL,
                isLoanding: null,
            }
                
        },
        props: {
            show: {
                type: Boolean,
                required: true
            },
            candidateID: {
                type: String,
                required: true
            },
            
        },

        methods: {
            async getData()
            {
                try {
                    const candidateStatus = await axios.get(`${this.api}/admin/candidate/${this.candidateID}`)                    
                    const status = await axios.get(`${this.api}/admin/status`)                    
                    this.candidateStatus = candidateStatus.data.status_curriculum
                    this.statuss = status.data

                } catch (error) {
                    console.error('Erro', error)
                }
            },

            async updateStatus()
            {
                try {
                    const newStatus = {
                        status_curriculum: this.status_
                    }
                    this.isLoanding = 'Carregando...'
                    
                    const response = await axios.put(`${this.api}/admin/update-status/candidate/${this.candidateID}`, newStatus)
                    console.log(response.data)
                    if(response.data.success === true)
                    {
                        this.isLoanding = ''
                      
                        alert('Status do curriculo alterado com sucesso!')
                    }
                } catch (error) {
                    console.error('Erro ao altere', error)

                } 
            }
        },

        mounted() { 
            this.getData()
            
        }
    }
    
</script>