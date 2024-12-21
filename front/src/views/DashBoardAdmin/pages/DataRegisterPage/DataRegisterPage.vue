<template>
  <div class="content-page">
    <DataRegisterContainer title="teste" :buttons="containers" class="m-5" />
    <DataRegisterContainer title="teste" :buttons="containers" class="m-5" />
    <DataRegisterContainer title="teste" :buttons="containers" class="m-5" />
    <DataRegisterContainer title="teste" :buttons="containers" class="m-5" />
  </div>
</template>

<script>
import DataRegisterContainer from "./Forms/DataRegisterContainer.vue";
export default {
  data() {
    return {
      containers: ["Criar", "Editar", "Atualizar", "Excluir"],
    };
  },
  methods: {
    deleteJob(id) {},
    editJob(id) {},
    viewJob(id) {},
  },
  components: {
    DataRegisterContainer,
  },
};
</script>

<style lang="scss" scoped>
.content-page {
  padding: 0;
  height: 100vh;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}
</style>
