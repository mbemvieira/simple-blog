<script setup>
import CommentForm from "./CommentForm.vue";
import CommentList from "./CommentList.vue";
</script>

<template>
    <header class="section-header">
        <h2>Comments</h2>
    </header>

    <section class="section-content">
        <CommentForm />
    </section>

    <section class="section-content">
        <CommentList />
    </section>
</template>
