<template>
    <v-text-field
      id="entrega"
      v-model="form.asignacion"
      label="Fecha de Entrega"
      type="date"
    ></v-text-field>
  </template>
  
  <script>
  import { ref } from 'vue';
  
  export default {
    setup() {
      const form = ref({
        asignacion: null,
      });
  
      return {
        form,
      };
    },
  };
  </script>