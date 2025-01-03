<template>
  <div id="app">
    <router-view />
    <FooterComponent v-if="$route.meta.requiresFooter !== false" />
  </div>
</template>
<script>
import NavBar from "@/components/NavBar.vue";
import FooterComponent from "@/components/FooterComponent.vue";
export default {
  components: {
    NavBar,
    FooterComponent,
  },
  mounted() {
    document.title = "Curriculo";
  },
};
</script>
<style lang="scss">
@import "@/assets/scss/main";
</style>
