<template>
  <div >
    <div class="mb-4 px-2 w-full teste">
      <input id="input1" class="w-96 border pl-4 py-2 rounded
      focus:border-blue-500 focus:shadow-outline
      outline-none " type="text"  placeholder="Vaga desejada" />
      <form class="max-w-40 mx-auto">
        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
          <option selected>Todas as Vagas</option>
          <option value="US">Desenvolvimento</option>
          <option value="CA">Comercial</option>
          <option value="FR">Suporte</option>
          <option value="DE">Administrativo</option>
        </select>
      </form>

    </div>
    <hr>
  </div>
</template>

<script>
export default {
  data() {
  },
  methods: {
  },
};
</script>

<style scoped>
/* Add your custom styles here */
.teste{
  margin: 50px 0;
  display: flex;
  justify-content: center;
  margin-right: 0;
}
</style>
