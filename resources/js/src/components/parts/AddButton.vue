<script setup lang="ts">
interface Props {
    title: string;
    icon: string;
    color?: string;
    style?: string;
}
interface Emits {
    (event: 'handle'): void
}

const props = withDefaults(defineProps<Props>(), {
    color: 'primary',
    style: 'outlined',
})

const emit = defineEmits<Emits>();
const handleClick = () => {
    emit('handle')
}

</script>

<template>
    <v-btn :color="color" :variant='style'
    @click=handleClick><v-icon>{{ icon }}</v-icon>{{ title }}</v-btn>
</template>
