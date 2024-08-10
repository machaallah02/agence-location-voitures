<template>
  <div class="flex h-screen">
    <!-- Sidebar -->
    <div :class="['bg-gray-800 text-white transition-all duration-300 h-screen', sidebarOpen ? 'w-64' : 'w-20']">
      <div class="p-4">
        <h2 v-if="sidebarOpen" class="text-xl font-bold">Admin </h2>
       <nav class="mt-6">
  <ul>
    <li class="flex items-center">
      <Link :href="route('admin.admin.index')" class="block px-4 py-2 hover:bg-gray-700 flex items-center">
        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
        <span v-if="sidebarOpen">Tableau de bord</span>
      </Link>
    </li>
    <li class="flex items-center">
      <Link :href="route('admin.users.index')" class="block px-4 py-2 hover:bg-gray-700 flex items-center">
        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 16s1 0 1-1 1-4 4-4 4 3 4 4 1 1 1 1H5zm7-5a2 2 0 100-4 2 2 0 000 4zm7 9h-2a2 2 0 01-2-2v-2a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2z" />
        </svg>
        <span v-if="sidebarOpen">Utilisateurs</span>
      </Link>
    </li>
    <li class="flex items-center">
      <Link :href="route('admin.admin.settings')" class="block px-4 py-2 hover:bg-gray-700 flex items-center">
        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0-6c.75 0 1.45.4 1.83 1.04l.71 1.23c.18.31.49.53.86.53h2.06c.85 0 1.5.79 1.34 1.62l-.35 1.97c-.07.4.04.81.27 1.14l1.47 1.47c.34.34.47.83.34 1.29l-.96 3.5c-.13.47-.55.79-1.05.79h-2.17c-.41 0-.8.17-1.09.47l-1.26 1.26c-.62.62-1.62.62-2.24 0l-1.26-1.26c-.29-.29-.68-.47-1.09-.47H5.34c-.5 0-.92-.32-1.05-.79l-.96-3.5c-.13-.46 0-.95.34-1.29l1.47-1.47c.23-.33.34-.74.27-1.14l-.35-1.97C3.1 6.62 3.75 5.83 4.6 5.83h2.06c.37 0 .68-.22.86-.53l.71-1.23C10.55 2.4 11.25 2 12 2zm0 4c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/>
        </svg>
        <span v-if="sidebarOpen">Paramètres</span>
      </Link>
    </li>
    <li class="flex items-center">
      <Link :href="route('admin.reservations.index')" class="block px-4 py-2 hover:bg-gray-700 flex items-center">
        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v12a4 4 0 004 4h10a4 4 0 004-4V3H5zM5 7h14m-7 7H5v-5h14v5h-7z" />
        </svg>
        <span v-if="sidebarOpen">Réservations</span>
      </Link>
    </li>
    <li class="flex items-center">
      <Link :href="route('admin.vehicules.index')" class="block px-4 py-2 hover:bg-gray-700 flex items-center">
        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8h18l-1 6H4L3 8zm0 0l1 8h14l1-8m-4 0v8M6 16h12M6 18h12" />
        </svg>
        <span v-if="sidebarOpen">Véhicules</span>
      </Link>
    </li>
    <li class="flex items-center">
      <Link href="/admin/maintenance" class="block px-4 py-2 hover:bg-gray-700 flex items-center">
        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3zm2 2v14h14V5H5zM7 9h2v6H7V9zm4 0h2v6h-2V9zM7 15h2v2H7v-2zm4 0h2v2h-2v-2z" />
        </svg>
        <span v-if="sidebarOpen">Maintenance</span>
      </Link>
    </li>
  </ul>
</nav>

      </div>
    </div>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
      <!-- Navbar -->
      <nav class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <button @click="toggleSidebar" class="text-white focus:outline-none">
          <!-- Icon for expanding/collapsing the sidebar -->
          <svg v-if="!sidebarOpen" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
          <svg v-else class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
        <h1 class="text-2xl font-bold">Tableau de bord</h1>
        <div class="flex items-center space-x-4">
          <!-- User avatar -->
          <div class="bg-gray-700 rounded-full h-8 w-8"></div>
          <!-- Logout button -->
          <form method="POST" action="/logout" @submit.prevent="logout">
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
              Déconnecter
            </button>
          </form>
        </div>
      </nav>

      <!-- Page content -->
      <main class="flex-1 p-6 bg-gray-100">
        <slot></slot>
      </main>
         <!-- Footer -->
      <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; 2024 Your Company. Tous droits réservés.</p>
      </footer>
    </div>

  </div>

</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const sidebarOpen = ref(true);

function toggleSidebar() {
  sidebarOpen.value = !sidebarOpen.value;
}

function logout() {
  // Optionally, add additional logic here before submitting the logout form
  document.querySelector('form').submit();
}
</script>

<style scoped>
/* Ajoutez des styles personnalisés si nécessaire */
</style>
