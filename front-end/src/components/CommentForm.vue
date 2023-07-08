<script setup>
import { ref } from "vue";

const name = ref();
const content = ref();
const emit = defineEmits(['submit']);

function onSubmit() {
    const data = {
        user_name: name.value,
        content: content.value,
    }

    emit('submit', data);
}
</script>

<template>
    <form>
        Name
        <input type="text" v-model="name" />

        Comment
        <input type="text" v-model="content" />

        <button type="submit" @click.prevent="onSubmit">Publish</button>
    </form>
</template>
