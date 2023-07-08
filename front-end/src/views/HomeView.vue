<script setup>
import CommentSection from '../components/CommentSection.vue'
</script>

<template>
    <main>
        <section class="card">
            <header class="section-header">
                <h2>Lorem ipsum</h2>
            </header>

            <article class="section-content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, ducimus ea nulla, sequi doloremque, rem corporis eveniet at blanditiis corrupti minus. Id, dignissimos quod nemo culpa sunt corrupti temporibus voluptatum.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos maiores iure architecto corporis sequi tenetur minus culpa, accusantium velit earum. Et quam voluptate pariatur accusamus dolorum vel minima placeat nemo.</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet delectus, vel tempore voluptas optio reiciendis vero, non facilis quod tempora quisquam soluta iste magnam aperiam sequi consectetur sint dolor ab?</p>
            </article>
        </section>

        <section class="card section-comments">
            <CommentSection />
        </section>
    </main>
</template>

<style scoped>
main {
    width: 100%;
    margin: 10px auto;
}

@media only screen and (min-width: 768px) {
    main {
        width: 80%;
    }
}

.section-comments {
    margin-top: 10px;
}
</style>
