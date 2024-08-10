<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Créer un Nouvel Utilisateur</h1>


    <!-- Spinner de Chargement -->
    <div v-if="form.processing" class="spinner"></div>

    <form @submit.prevent="submit">
      <!-- Champ Nom -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="nom">Nom</label>
        <input type="text" v-model="form.nom" id="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        <p v-if="form.errors.nom" class="text-red-500 text-xs italic">{{ form.errors.nom }}</p>
      </div>

      <!-- Champ Email -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
        <input type="email" v-model="form.email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        <p v-if="form.errors.email" class="text-red-500 text-xs italic">{{ form.errors.email }}</p>
      </div>

      <!-- Champ Mot de Passe -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="password">Mot de Passe</label>
        <input type="password" v-model="form.password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        <p v-if="form.errors.password" class="text-red-500 text-xs italic">{{ form.errors.password }}</p>
      </div>

      <!-- Champ Confirmation du Mot de Passe -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="password_confirmation">Confirmer le Mot de Passe</label>
        <input type="password" v-model="form.password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        <p v-if="form.errors.password_confirmation" class="text-red-500 text-xs italic">{{ form.errors.password_confirmation }}</p>
      </div>

      <!-- Champ Rôle -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="role">Rôle</label>
        <select v-model="form.role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
          <option value="admin">Admin</option>
          <option value="personnel">Personnel</option>
          <option value="client">Client</option>
        </select>
        <p v-if="form.errors.role" class="text-red-500 text-xs italic">{{ form.errors.role }}</p>
      </div>

      <div class="flex items-center justify-between">
        <button :disabled="form.processing" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Créer
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';

const toast = useToast();
export default {
  setup() {
    const form = useForm({
      nom: '',
      email: '',
      password: '',
      password_confirmation: '',
      role: 'client'
    });


    const submit = () => {
      form.post('/admin/users', {
       onSuccess: (page) => {
            console.log(form)
            if (page.props.flash.success) {
                toast.success(page.props.flash.success, {
                    position: 'top-right',
                    timeout: 5000,
                    closeOnClick: true,
                    pauseOnHover: true,
                });
            }
        },
       onError: (page) => {
  const errorMessage = page.props?.flash?.error || 'Une erreur est survenue';
  toast.error(errorMessage, {
    position: 'top-right',
    timeout: 5000,
    closeOnClick: true,
    pauseOnHover: true,
  });
},
      });
    };

    return { form, submit};
  }
};
</script>

<style scoped>
.spinner {
  border: 4px solid rgba(0, 0, 0, 0.1);
  border-radius: 50%;
  border-top: 4px solid #3498db;
  width: 40px;
  height: 40px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
