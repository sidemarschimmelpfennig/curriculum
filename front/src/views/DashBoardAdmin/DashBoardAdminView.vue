<template>
  <div class="dashboard-admin">
    <SidebarAdmin/>
    <div class="dashboard-content">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
//import SidebarAdmin from
import SidebarAdmin from "@/components/SidebarAdmin.vue";

export default {
  name: "DashBoardAdminView",
  components: {
    SidebarAdmin,
  },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/views/dashboardadmin";
</style>
