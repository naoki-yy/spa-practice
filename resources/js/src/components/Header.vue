<script setup lang="ts">
import axios from 'axios';
import { useRouter } from "vue-router";
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
<template>
    <v-app-bar color="primary">
        <v-app-bar-title>
            SPA練習アプリ
        </v-app-bar-title>

        <template v-slot:append>
            <v-btn @click="logout">
                logout
            </v-btn>

            <v-btn>
                <v-icon>
                    mdi-home
                </v-icon>
            </v-btn>
        </template>

    </v-app-bar>



</template>
