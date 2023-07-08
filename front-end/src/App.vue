<script setup>
import { RouterView } from 'vue-router'
</script>

<template>
    <header>
        <h1>Blog ABC</h1>
    </header>

    <RouterView />
</template>

<style scoped>
header {
    background: white;
    padding: 12px;
}
</style>
