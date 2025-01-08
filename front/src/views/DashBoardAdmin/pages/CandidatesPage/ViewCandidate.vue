<template>
    <div class="mx-auto p-6 bg-white shadow-md rounded-lg showModalComponent">
        <h1>Usuário aqui</h1>
        <span
        class="material-icons text-white bold pl-8 hover:text-red-600 hover:cursor-pointer"
        @click="closeModal"
        >close</span
      >
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "ViewCandidate",

        props: {
            showModal: {
                type: Boolean,
                required: true

            }
        }
    }
</script>