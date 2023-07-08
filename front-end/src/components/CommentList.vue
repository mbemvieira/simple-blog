<script setup>
import { ref, watch } from "vue";
import CommentForm from "./CommentForm.vue";

const props = defineProps({
    comments: Array,
    layer: Number,
});

const showReply = ref([]);
const emit = defineEmits(['create']);

const createComment = (index, data) => {
    showReply.value[index] = false;
    data.parent_id = props.comments[index].id;

    emit('create', data);
};
</script>

<template>
    <section
        v-for="(comment, index) in comments"
        :key="`comment_id_${comment.id}`"
        class="comment-block"
    >
        <article>
            {{ `[${comment.user_name}] ${comment.content}` }}
        </article>

        <footer v-if="layer < 3">
            <button
                @click="showReply[index] = true"
                type="button"
            >Reply</button>

            <button
                v-if="showReply[index]"
                @click="showReply[index] = false"
                type="button"
            >Cancel</button>
        </footer>

        <section v-if="showReply[index]">
            <CommentForm
                @submit="(data) => createComment(index, data)"
            />
        </section>

        <section
            v-if="comment.replies !== null"
            class="replies"
        >
            <CommentList
                :comments="comment.replies"
                :layer="layer + 1"
                @create="(data) => $emit('create', data)"
            />
        </section>
    </section>
</template>

<style scoped>
.comment-block {
    margin: 15px 0;
}

.replies {
    margin-left: 15px;
}
</style>
