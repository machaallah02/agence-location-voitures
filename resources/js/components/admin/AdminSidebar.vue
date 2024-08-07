<template>
  <div class="w-64 h-screen bg-gray-800 text-white">
    <div class="p-4">
      <h2 class="text-xl font-bold">Admin Panel</h2>
      <nav class="mt-6">
        <ul>
          <li>
            <router-link to="/admin/dashboard" class="block px-4 py-2 hover:bg-gray-700">Dashboard</router-link>
          </li>
          <li>
            <router-link to="/admin/users" class="block px-4 py-2 hover:bg-gray-700">Users</router-link>
          </li>
          <li>
            <router-link to="/admin/settings" class="block px-4 py-2 hover:bg-gray-700">Settings</router-link>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  name: 'AdminSidebar',
};
</script>

<style scoped>
/* Ajoutez des styles personnalisés si nécessaire */
</style>
