<script setup>
import { ref, onMounted } from "vue";
import CommentForm from "./CommentForm.vue";
import CommentList from "./CommentList.vue";
import { getComments, createComment } from "../services/api";

const comments = ref([]);

onMounted(async () => {
    try {
        comments.value = await getComments();
    } catch (error) {
        alert(error.message);
    }
});

const create = async (data) => {
    try {
        await createComment(data);
        comments.value = await getComments();
    } catch(error) {
        alert(error.message);
    }
};
</script>

<template>
    <header class="section-header">
        <h2>Comments</h2>
    </header>

    <section class="section-content">
        <CommentForm @submit="create" />
    </section>

    <section v-if="comments !== null" class="section-content">
        <CommentList
            :comments="comments"
            :layer="0"
            @create="create"
        />
    </section>
</template>
