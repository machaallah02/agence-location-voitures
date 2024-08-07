<!-- resources/js/Layouts/AppLayout.vue -->
<template>
  <div>
    <Navbar />
    <main>
      <slot></slot>
    </main>
    <Footer />
  </div>
</template>

<script>
import Navbar from '../components/Navbar.vue';
import Footer from '../components/Footer.vue';

export default {
  name: 'AppLayout',
  components: {
    Navbar,
    Footer
  }
};
</script>

<style scoped>
/* Ajoutez des styles personnalisés si nécessaire */
</style>
