<script setup>
import { ref } from 'vue'

const comments = ref([
    {
        id: 1,
        content: 'testing'
    }
]);
</script>

<template>
    <section v-for="(comment, index) in comments" :key="`comment_id_${comment.id}`">
        <article>
            {{ comment.content }}
        </article>

        <footer>
            <button type="button">Reply</button>
        </footer>
    </section>
</template>
