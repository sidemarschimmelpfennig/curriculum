<template>
    <h1>Editar Status do candidato</h1>
    
    <form @submit.prevent="updateStatus()">
        <div v-for="(candidate, id) in candidateData" :key="id">
            Status atual: {{ candidate.status }}
            
            <label for="status_id">Novo status</label>
            <select 
                v-model="status_id"
                required
            >
            <option
                v-for="status in statuss"
                :key="status.id"
                :value="status.status"

            >
            {{ status.status }}

            </option>

            </select>
        </div>
        <button 
            type="submit"
            @click="updateStatus(id)"
        >
            Alterer Status
        </button>
    </form>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "ViewCandidate",
        data(){
            return {
                candidateData: [],
                statuss: [],
                status_id: null,
                api: process.env.VUE_APP_API_URL,

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
                    const candidateStatus = await axios.get(`${this.api}/candidate/${this.candidateID}`)                    
                    const status = await axios.get(`${this.api}/admin/status`)                    
                    this.candidateData = candidateStatus.data
                    this.statuss = status.data

                    console.log('Todos os status', this.statuss)

                } catch (error) {
                    console.error('Erro', error)
                }
            },

            async updateStatus(id)
            {
                try {
                    const newStatus = {
                        status_id: this.newStatus
                    }

                    console.log('Novo Status de envio', newStatus)
                    const response = await axios.put(`${this.api}/admin/update-status/candidate/${this.candidateID}`, newStatus)
                    console.log('Vaga alterada', response.data)
                } catch (error) {

                } 
            }
        },

        mounted() { 
            this.getData()
            console.log(this.candidateID)
        }
    }
    
</script>