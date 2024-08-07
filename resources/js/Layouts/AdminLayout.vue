<template>
  <div class="flex">
    <AdminSidebar />
    <div class="flex-1">
      <AdminNavbar />
      <main class="p-6">
        <slot />
      </main>
    </div>
  </div>
</template>

<script>
import AdminSidebar from '../components/admin/AdminSidebar.vue';
import AdminNavbar from '../components/admin/AdminNavbar.vue';

export default {
  components: {
    AdminSidebar,
    AdminNavbar,
  },
};
</script>
