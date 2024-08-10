<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Ajouter un Véhicule</h1>

     <div v-if="form.processing" class="spinner items-center justify-center"></div>
    <form @submit.prevent="submit">
      <div class="mb-4">
        <label class="block">Marque</label>
        <input v-model="form.marque" type="text" class="form-input" />
        <span v-if="form.errors.marque" class="text-red-500">{{ form.errors.marque }}</span>
      </div>

      <div class="mb-4">
        <label class="block">Modèle</label>
        <input v-model="form.modele" type="text" class="form-input" />
        <span v-if="form.errors.modele" class="text-red-500">{{ form.errors.modele }}</span>
      </div>

      <div class="mb-4">
        <label class="block">Année</label>
        <input v-model="form.année" type="number" class="form-input" />
        <span v-if="form.errors.année" class="text-red-500">{{ form.errors.année }}</span>
      </div>

      <div class="mb-4">
        <label class="block">Numéro d'immatriculation</label>
        <input v-model="form.numéro_immatriculation" type="text" class="form-input" />
        <span v-if="form.errors.numéro_immatriculation" class="text-red-500">{{ form.errors.numéro_immatriculation }}</span>
      </div>

      <div class="mb-4">
        <label class="block">Statut disponibilité</label>
        <select v-model="form.statut_disponibilité" class="form-select">
          <option :value="true">Disponible</option>
          <option :value="false">Indisponible</option>
        </select>
        <span v-if="form.errors.statut_disponibilité" class="text-red-500">{{ form.errors.statut_disponibilité }}</span>
      </div>

      <div class="mb-4">
        <label class="block">Tarif de location</label>
        <input v-model="form.tarif_location" type="number" step="0.01" class="form-input" />
        <span v-if="form.errors.tarif_location" class="text-red-500">{{ form.errors.tarif_location }}</span>
      </div>

      <button :disabled="form.processing" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer</button>
    </form>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import {useToast } from 'vue-toastification';

const toast = useToast();

export default {
  setup() {
    const form = useForm({
      marque: '',
      modele: '',
      année: '',
      numéro_immatriculation: '',
      statut_disponibilité: true,
      tarif_location: '',
    });

   

    const submit = () => {
      form.post('/admin/vehicules', {
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

    return { form, submit };
  },
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
