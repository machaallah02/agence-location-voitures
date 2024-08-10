<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Détails du Véhicule</h1>
    <div class="mb-4">
      <strong>Marque:</strong> {{ vehicule.marque }}
    </div>
    <div class="mb-4">
      <strong>Modèle:</strong> {{ vehicule.modele }}
    </div>
    <div class="mb-4">
      <strong>Année:</strong> {{ vehicule.année }}
    </div>
    <div class="mb-4">
      <strong>Numéro d'immatriculation:</strong> {{ vehicule.numéro_immatriculation }}
    </div>
    <div class="mb-4">
      <strong>Statut disponibilité:</strong> {{ vehicule.statut_disponibilité ? 'Disponible' : 'Indisponible' }}
    </div>
    <div class="mb-4">
      <strong>Tarif de location:</strong> {{ vehicule.tarif_location }} €
    </div>
    <Link :href="route('admin.vehicules.edit', vehicule.id)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</Link>
    <Link :href="route('admin.vehicules.index')" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-4">Retour à la Liste</Link>
  </div>
</template>

<script>
export default {
  props: {
    vehicule: Object,
  },
};
</script>

<style scoped>
/* Ajoutez des styles personnalisés si nécessaire */
</style>
