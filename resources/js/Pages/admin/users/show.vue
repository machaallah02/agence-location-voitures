<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Détails de l'Utilisateur</h1>
    
    <div class="mb-4">
      <p><strong>ID:</strong> {{ user.id }}</p>
      <p><strong>Nom:</strong> {{ user.nom }}</p>
      <p><strong>Email:</strong> {{ user.email }}</p>
      <p><strong>Rôle:</strong> {{ user.role }}</p>
    </div>

    <button @click="goBack" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Retour</button>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
  },
  methods: {
    goBack() {
      this.$inertia.visit('/admin/users');
    }
  }
};
</script>

<style scoped>
/* Add any custom styles if needed */
</style>
