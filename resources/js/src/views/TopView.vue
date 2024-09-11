<script setup lang="ts">
import { ref, Ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import AddButton from '../components/parts/AddButton.vue';

const router = useRouter();
const todo = ref(false);
const new_item: Ref<string> = ref("");
const memo: Ref<string> = ref("");

const addTodo = () => {
    console.log('add');
}
// 初期表示取得
const init = async() => {
    try {
      const response = await axios.get('/api/todo');
      console.log(response.data);

    } catch (error) {
      console.error('Login failed:', error);
    }
}

onMounted(() => {
    init();
})
</script>

<template>
    <div class="text-h4 font-weight-bold text-center">買い物 ToDo</div>
    <v-container class="w-75">
        <v-table class="h-100 border">
            <thead>
                <tr>
                    <th width="10%"></th>
                    <th width="35%">購入予定品</th>
                    <th width="35%">備考</th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="d-flex justify-center">
                        <v-checkbox v-model="todo"></v-checkbox>
                    </td>
                    <td></td>
                    <td></td>
                    <td><v-icon>mdi-pencil</v-icon></td>
                    <td><v-icon>mdi-trash-can</v-icon></td>
                </tr>
                <tr>
                    <td class="d-flex align-center pt-7"><AddButton icon="mdi-plus" title="新規追加" @handle="addTodo" /></td>
                    <td class="pt-3"><v-text-field v-model="new_item" label="購入予定品" required></v-text-field></td>
                    <td class="pt-3" width="55%"><v-text-field v-model="memo" label="備考" required></v-text-field></td>
                </tr>
            </tbody>
        </v-table>
    </v-container>
</template>
