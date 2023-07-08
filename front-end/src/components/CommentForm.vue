<script setup>

function onSubmit() {
    alert('create comment');
}
</script>

<template>
    <form>
        Name
        <input type="text" name="" id="" />

        Comment
        <textarea name="" id="" cols="30" rows="10"></textarea>

        <button type="submit" @click.prevent="onSubmit">Comment</button>
    </form>
</template>
