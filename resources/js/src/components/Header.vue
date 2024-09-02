<script setup lang="ts">
</script>
<template>
    <v-app-bar color="primary">
        <template v-slot:prepend>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
        </template>

        <v-app-bar-title>
            献立作成アプリ
        </v-app-bar-title>

        <template v-slot:append>
            <v-btn>
                Sign-In
            </v-btn>

            <v-btn>
                <v-icon>
                    mdi-home
                </v-icon>
            </v-btn>
        </template>

    </v-app-bar>



</template>
