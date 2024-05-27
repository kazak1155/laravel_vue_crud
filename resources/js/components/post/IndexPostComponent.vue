<template>
    <div>

        <div v-show="tablePosts">
            <template v-show="tablePosts" v-for="post in posts">
                <show-post-component :post="post" :ref="`showPostComponent_${post.id}`"></show-post-component>
                <edit-post-component :post="post" :ref="`editPostComponent_${post.id}`"></edit-post-component>
            </template>
        </div>

    </div>
</template>

<script>
import EditPostComponent from "./EditPostComponent.vue";
import ShowPostComponent from "./ShowPostComponent.vue";

export default {
    name: "IndexPostComponent",

    components: {
        EditPostComponent,
        ShowPostComponent
    },

    data() {
        return {
            posts: null,
            tablePosts: true,
            editPostId: null,
            title: null,
            description: null,
            author: null
        }
    },

    mounted() {
        this.getAllPosts()
    },

    methods: {
        getAllPosts() {
            axios.get('/api/post')
                .then(response => {
                    this.posts = response.data
                })
                .catch(error => {
                    console.log(error.message)
                })
        },

        getFormToCreatePost() {
            this.tablePosts = false
            this.$parent.$refs.CreatePostComponent.formToCreatePost = true
            this.$parent.buttonCreatePost = false
        },

        isEditPost(id) {
            return this.editPostId === id;
        },

        changeEditPost(id) {
            this.editPostId = id
            let editName = `editPostComponent_${id}`
            this.$refs[editName][0].title = this.$refs[editName][0].post.title
            this.$refs[editName][0].description = this.$refs[editName][0].post.description
            this.$refs[editName][0].author = this.$refs[editName][0].post.author
        },

        deletePost(id) {
            axios.delete(`/api/post/${id}`,
            )
                .then(response => {
                    this.editPostId = null
                    this.getAllPosts()
                })
                .catch(error => {
                    console.log(error.response)
                });
        },

        updatePost(id) {
            axios.patch(`/api/post/${id}`,
                {
                    title: this.title,
                    description: this.description,
                    author: this.author,
                }
            )
                .then(response => {
                    this.editPostId = null
                    this.getAllPosts()
                })
                .catch(error => {
                    console.log(error.response)
                });
        },
    },
}

</script>

<style scoped>

</style>
