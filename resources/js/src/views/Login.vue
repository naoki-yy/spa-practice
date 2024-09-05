<script setup lang="ts">
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const valid = ref(false);

const mailRules = [
    (v: string) => !!v || "mail is required",
    (v: string) => /.+@.+\..+/.test(v) || 'E-mail must be valid'
];

const pwRules = [(v: string) => !!v || "password is required"];

const submitGoogle = async() => {
    try {
      await axios.get('/auth/google/callback');
      router.push('/');
    } catch (error) {
      console.error('Login failed:', error);
    }
};

const forgetPw = () => {
    // パスワードを忘れた時の処理
};
</script>

<template>
    <v-card class="d-flex flex-column mx-auto my-6 flat" width="374" color="fff" elevation="5">
        <v-card-title class="d-flex justify-center pa-0 mt-6">ログイン</v-card-title>
        <v-card-text class="d-flex justify-center flex-column">
            <v-btn class="fill-width mt-6 text-capitalize caption mx-4 mb-6" rounded height="48px" outlined
                style="border-color: #979797" @click="submitGoogle">
                <img class="button-logo-img mr-4" src="../../../../public/images/google-icon.png"
                    style="height: 24px" />
                Googleでログイン
            </v-btn>
            <p class="text-center pt-3 mt-3 mb-1 text-subtitle-1 siginIn-border-top">
                メールアドレスでログイン
            </p>
            <v-form class="mx-9" ref="form" v-model="valid">
                <v-text-field placeholder="メールアドレス" outlined dense :rules="mailRules"></v-text-field>
                <v-text-field placeholder="パスワード" outlined dense :rules="pwRules"></v-text-field>
                <p class="pointer" @click="forgetPw">パスワードを忘れた方</p>
                <div class="text-center">
                    <v-btn class="primary" :disabled="!valid">ログイン</v-btn>
                </div>
            </v-form>
        </v-card-text>
    </v-card>
</template>
