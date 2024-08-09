<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Modifier l'Utilisateur</h1>

    <form @submit.prevent="submit">
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="nom">Nom</label>
        <input type="text" v-model="form.nom" id="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
        <input type="email" v-model="form.email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="password">Mot de Passe (Laissez vide pour ne pas changer)</label>
        <input type="password" v-model="form.password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="password_confirmation">Confirmer le Mot de Passe</label>
        <input type="password" v-model="form.password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="role">Rôle</label>
        <select v-model="form.role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
          <option value="admin">Admin</option>
          <option value="personnel">Personnel</option>
          <option value="client">Client</option>
        </select>
      </div>

      <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Mettre à jour</button>
      </div>
    </form>

  </div>
</template>
<script setup>
import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';

const toast = useToast();

const props = defineProps({
  user: Object,
});

const form = reactive({
  nom: props.user.nom,
  email: props.user.email,
  password: '',
  password_confirmation: '',
  role: props.user.role,
});

const submit = () => {
  useForm(form).put(route('admin.users.update', props.user.id), {
    onSuccess: (page) => {
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
</script>

