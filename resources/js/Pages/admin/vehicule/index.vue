<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Gestion des Véhicules</h1>
    <div class="mb-4">
      <Link :href="route('admin.vehicules.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un Véhicule</Link>
    </div>

    <table class="min-w-full bg-white border border-gray-200">
      <thead>
        <tr class="w-full bg-gray-100 border-b">
          <th class="py-2 px-4 text-left">Marque</th>
          <th class="py-2 px-4 text-left">Modèle</th>
          <th class="py-2 px-4 text-left">Année</th>
          <th class="py-2 px-4 text-left">Numéro d'immatriculation</th>
          <th class="py-2 px-4 text-left">Statut</th>
          <th class="py-2 px-4 text-left">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="vehicule in vehicules" :key="vehicule.id" class="border-b">
          <td class="py-2 px-4">{{ vehicule.marque }}</td>
          <td class="py-2 px-4">{{ vehicule.modele }}</td>
          <td class="py-2 px-4">{{ vehicule.année }}</td>
          <td class="py-2 px-4">{{ vehicule.numéro_immatriculation }}</td>
          <td class="py-2 px-4">{{ vehicule.statut_disponibilité ? 'Disponible' : 'Indisponible' }}</td>
          <td class="py-2 px-4">
            <Link :href="route('admin.vehicules.edit', vehicule.id)" class="text-blue-500 hover:underline">Modifier</Link>
            <Link :href="route('admin.vehicules.show', vehicule.id)" class="text-green-500 hover:underline ml-4">Voir</Link>
            <button @click="deleteVehicule(vehicule.id)" class="text-red-500 hover:underline ml-4">Supprimer</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { useToast } from 'vue-toastification';
import Swal from 'sweetalert2';

export default {
  props: {
    vehicules: Array,
  },
  setup() {
    const toast = useToast();

    const deleteVehicule = (vehiculeId) => {
      Swal.fire({
        title: 'Êtes-vous sûr ?',
        text: "Vous ne pourrez pas annuler cela !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimez-le !'
      }).then((result) => {
        if (result.isConfirmed) {
          Inertia.delete(`/admin/vehicules/${vehiculeId}`, {
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
        }
      });
    };

    return { deleteVehicule };
  }
};
</script>

<style scoped>
/* Ajoutez des styles personnalisés si nécessaire */
</style>
