<template>

    <tr :class="this.$parent.isEditPost(post.id) ? '' : 'd-none'">
        <th scope="row">{{ post.id }}</th>
        <td><input v-model="title" class="form-control" type="text"></td>
        <td><input v-model="description" class="form-control" type="text"></td>
        <td><input v-model="author" class="form-control" type="text"></td>
        <td><a class="btn btn-success" href="#" @click.prevent="updatePost(post.id)">Update</a></td>
    </tr>

</template>

<script>

export default {
    name: "EditPostComponent",

    props: [
        'post'
    ],

    data() {
        return {
            title: null,
            description: null,
            author: null
        }
    },

    mounted() {
    },

    methods: {
        updatePost(id) {
            this.$parent.editPostId = id
            axios.patch(`/api/post/${id}`,
                {
                    title: this.title,
                    description: this.description,
                    author: this.author,
                }
            )
                .then(response => {
                    this.$parent.editPostId = null
                    this.$parent.getAllPosts()
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
