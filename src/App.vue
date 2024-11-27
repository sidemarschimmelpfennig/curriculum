<template>
  <div id="app">
    <NavBar/>
    <router-view/>
    <FooterComponent/>
  </div>

</template>
<script>
import NavBar from './components/NavBar.vue';
import FooterComponent from './components/FooterComponent.vue';

export default {
  components: {
    NavBar,
    FooterComponent,
  },
  data(){
  }
};
</script>
<style lang="scss">
  @import '@/assets/scss/main'
</style>
