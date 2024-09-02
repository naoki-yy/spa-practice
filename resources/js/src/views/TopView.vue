<template>
    <v-btn @click="logout" color="primary">
      Logout
    </v-btn>
  </template>

  <script setup lang="ts">
  import { useRouter } from 'vue-router';
  import axios from 'axios';

  const router = useRouter();

  const logout = async () => {
    try {
      await axios.get('/logout');
      router.push('/login');
    } catch (error) {
      console.error('Logout failed:', error);
    }
  };
  </script>
