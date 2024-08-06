<template>
  <div class="min-h-screen flex flex-col bg-gray-100">
    <navbar></navbar>
    <main class="flex-1 flex flex-col items-center justify-center py-6 sm:py-12">
      <div class="max-w-md w-full bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold text-center text-blue-600">Bienvenue dans notre Agence de Location de Voitures</h1>
        <p class="mt-4 text-center text-gray-700">Nous offrons une large sélection de véhicules pour vos besoins de location. Réservez facilement en ligne et profitez d'un service rapide et fiable.</p>
        <div class="mt-6 flex justify-center">
          <a href="/reservations" class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600">Réservez Maintenant</a>
        </div>
      </div>
    </main>
    <footer-component></footer-component>
  </div>
</template>

<script>
import Navbar from './Navbar.vue';
import FooterComponent from './FooterComponent.vue';

export default {
  name: 'HomePage',
  components: {
    Navbar,
    FooterComponent
  }
}
</script>

<style scoped>
/* Ajoutez des styles personnalisés si nécessaire */
</style>
