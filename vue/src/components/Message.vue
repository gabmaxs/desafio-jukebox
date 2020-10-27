<template>
    <section class="hero" v-bind:class="{ 'is-success' : isSuccess, 'is-danger' : !isSuccess}">
        <div class="hero-body">
            <div class="container">
            <h1 class="title">
                {{type}}
            </h1>
            <h2 class="subtitle">
                {{msg}}
            </h2>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Message",
    props: {
        type: String,
        msg: String
    },
    computed: {
        isSuccess() {
            return this.type == 'Sucesso'
        }
    }
}
</script>