<script setup lang="ts">
import {computed} from "vue"
import Header from "./components/Header.vue";
import { RouterView, useRoute, useRouter } from "vue-router";
import Footer from "./components/Footer.vue";

const route = useRoute();
const showDrawer = computed(() => route.path !== "/login")


</script>

<template>
    <v-app>
        <Header />
        <v-main>
            <v-container>
                <RouterView />
            </v-container>
        </v-main>
        <Footer />
        <v-navigation-drawer v-if="showDrawer" permanet>
            <v-list nav>
                <v-list-item prepend-icon="mdi-view-dashboard" title="Top" value="top" :to="{name: 'top'}"></v-list-item>
                <v-list-item prepend-icon="mdi-forum" title="About" value="about" :to="{name: 'about'}"></v-list-item>
            </v-list>
        </v-navigation-drawer>
    </v-app>
</template>
