<template>
  <div>
    <h1>Page de Connexion</h1>
    <!-- Formulaire de connexion -->
    <form @submit.prevent="login">
      <div>
        <label for="email">Email</label>
        <input type="email" v-model="email" id="email" required />
      </div>
      <div>
        <label for="password">Mot de passe</label>
        <input type="password" v-model="password" id="password" required />
      </div>
      <button type="submit">Connexion</button>
    </form>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  name: 'Login',
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    login() {
      Inertia.post('/login', {
        email: this.email,
        password: this.password,
      });
    },
  },
};
</script>

<style scoped>
/* Ajoutez des styles personnalisés si nécessaire */
</style>
