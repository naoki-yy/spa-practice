<script setup lang="ts">
import { ref, Ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import AddButton from '../components/parts/AddButton.vue';

interface ToDoLists {
    id: number,
    date: Date,
    checking: number,
    item: string,
    memo: string,
}

const router = useRouter();
const todo = ref(false);
const new_item: Ref<string> = ref("");
const memo: Ref<string> = ref("");
const todolists: Ref<ToDoLists[]> = ref([]);

const addTodo = () => {
    console.log('add');
}
// 初期表示取得
const init = async() => {
    try {
      const response = await axios.get('/api/todo');
      todolists.value = {...response.data}
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
                <template v-for="todolist in todolists" :key="todolist.id">
                    <tr>
                        <td class="d-flex justify-center">
                            <v-checkbox v-model="todo"></v-checkbox>
                        </td>
                        <td>{{ todolist.item }}</td>
                        <td>{{ todolist.memo }}</td>
                        <td><v-icon>mdi-pencil</v-icon></td>
                        <td><v-icon>mdi-trash-can</v-icon></td>
                    </tr>
                </template>
                <tr>
                    <td class="d-flex align-center pt-7"><AddButton icon="mdi-plus" title="新規追加" @handle="addTodo" /></td>
                    <td class="pt-3"><v-text-field v-model="new_item" label="購入予定品" required></v-text-field></td>
                    <td class="pt-3" width="55%"><v-text-field v-model="memo" label="備考" required></v-text-field></td>
                </tr>
            </tbody>
        </v-table>
    </v-container>
</template>
