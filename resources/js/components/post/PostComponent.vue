<template>
    <div>
        <create-post-component ref="CreatePostComponent"></create-post-component>
        <index-post-component ref="IndexPostComponent"></index-post-component>

        <div v-show="buttonCreatePost" class="btn-group p-3">
            <button @click.prevent="$refs.IndexPostComponent.getFormToCreatePost" class="btn btn-secondary">создать новый пост</button>
        </div>
    </div>
</template>

<script>
import CreatePostComponent from "./CreatePostComponent.vue";
import IndexPostComponent from "./IndexPostComponent.vue";

export default {
    name: "postComponent",

    components: {
        CreatePostComponent,
        IndexPostComponent
    },

    data() {
        return {
            buttonCreatePost: true
        }
    },

    mounted() {
    },

    methods: {
    },
}

</script>

<style scoped>

</style>
