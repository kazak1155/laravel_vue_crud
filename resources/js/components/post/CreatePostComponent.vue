<template>
    <div v-show="formToCreatePost" class="p-5">
        <form>
            <div class="form-group">
                <label for="titlePost">title post</label>
                <input type="text" class="form-control" v-model="title" id="titlePost" placeholder="title">
                <small id="titlePostHelp" class="form-text text-muted">enter title post</small>
            </div>
            <div class="form-group">
                <label for="descriptionPost">description post</label>
                <input type="text" class="form-control" v-model="description" id="descriptionPost" placeholder="description">
                <small id="descriptionePostHelp" class="form-text text-muted">enter description post</small>
            </div>
            <div class="form-group">
                <label for="authorPost">author</label>
                <input type="text" class="form-control" v-model="author" id="authorPost" placeholder="author">
                <small id="authorPostHelp" class="form-text text-muted">enter author post</small>
            </div>
            <button @click.prevent='storePost' type="submit" class="btn btn-primary">create post</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreatePostComponent",

    data(){
        return {
            formToCreatePost: false,
            title: null,
            description: null,
            author: null,
        }
    },

    methods: {
        storePost() {
            axios.post('/api/post',
                {
                    title: this.title,
                    description: this.author,
                    author: this.author,
                }
            )
                .then( res => {
                    this.formToCreatePost = false
                    this.$parent.$refs.IndexPostComponent.tablePosts = true
                    this.$parent.$refs.IndexPostComponent.getAllPosts()
                    this.$parent.buttonCreatePost = true
                })
                .catch(error=>{
                    console.log(error.response)
                });
        },
    }

}
</script>

<style scoped>

</style>
