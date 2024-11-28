<template>
  <div class="main">
    <!-- Navbar no topo -->
    <Navbar class="navbar"/>

    <!-- Slot com conteúdo centralizado -->
    <div class="page-content">
      <slot name="slot-page"></slot>
    </div>

    <!-- Footer no final da página -->
    <FooterComponent />
  </div>
</template>
<script>
import FooterComponent from '@/components/FooterComponent.vue';
import NavBar from '@/components/NavBar.vue';

export default {
  name: 'SinglePageSlot',
  components: {
    NavBar,
    FooterComponent,
  },
};
</script>
<style lang="scss">
@import '@/assets/scss/singlepage';
.main {
  display: flex;
  flex-direction: column;
  height: 100vh; /* A altura total da tela */
}

.page-content {
  flex: 1; /* Isso garante que o conteúdo ocupe o espaço restante */
  display: flex;
  justify-content: center; /* Alinha o conteúdo do slot horizontalmente */
  align-items: center; /* Alinha o conteúdo do slot verticalmente */ /* Pode ser ajustado conforme necessário */
}

footer {
  margin-top: auto; /* Garante que o footer sempre fique no final da página */
}
</style>
