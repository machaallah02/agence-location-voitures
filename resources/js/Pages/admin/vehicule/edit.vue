<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Modifier le Véhicule</h1>

    <form @submit.prevent="submit">
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="marque">Marque</label>
        <input type="text" v-model="form.marque" id="marque" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="modele">Modèle</label>
        <input type="text" v-model="form.modele" id="modele" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="année">Année</label>
        <input type="number" v-model="form.année" id="année" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="numéro_immatriculation">Numéro d'immatriculation</label>
        <input type="text" v-model="form.numéro_immatriculation" id="numéro_immatriculation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="statut_disponibilité">Statut disponibilité</label>
        <select v-model="form.statut_disponibilité" id="statut_disponibilité" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
          <option :value="true">Disponible</option>
          <option :value="false">Indisponible</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="tarif_location">Tarif de location</label>
        <input type="number" v-model="form.tarif_location" id="tarif_location" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
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
  vehicule: Object,
});

const form = reactive({
  id: props.vehicule.id,
  marque: props.vehicule.marque || '',
  modele: props.vehicule.modele || '',
  année: props.vehicule.année || '',
  numéro_immatriculation: props.vehicule.numéro_immatriculation || '',
  statut_disponibilité: props.vehicule.statut_disponibilité || true,
  tarif_location: props.vehicule.tarif_location || '',
  errors: {}
});

const submit = () => {
  useForm(form).put(route('admin.vehicules.update', form.id), {
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
      form.errors = page.props.errors || {};
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

<style scoped>
/* Ajoutez des styles personnalisés si nécessaire */
</style>
