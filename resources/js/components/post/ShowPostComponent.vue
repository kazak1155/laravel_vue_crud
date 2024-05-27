<template>

    <tr :class="this.$parent.isEditPost(post.id) ? 'd-none' : ''">
        <th>{{ post.id }}</th>
        <td>{{ post.title }}</td>
        <td>{{ post.description }}</td>
        <td>{{ post.author }}</td>
        <td><a href="#" @click.prevent="changeEditPost(post.id)" class="btn btn-success">Edit</a></td>
        <td><a href="#" @click.prevent="deletePost(post.id)" class="btn btn-danger">Delete</a></td>
    </tr>

</template>

<script>

export default {
    name: "ShowPostComponent",


    data() {
        return {}
    },

    props: [
        'post'
    ],

    mounted() {
    },

    methods: {

        changeEditPost(id) {
            this.$parent.editPostId = id
            let editName = `editPostComponent_${id}`
            this.$parent.$refs[editName][0].title = this.$parent.$refs[editName][0].post.title
            this.$parent.$refs[editName][0].description = this.$parent.$refs[editName][0].post.description
            this.$parent.$refs[editName][0].author = this.$parent.$refs[editName][0].post.author
        },

        deletePost(id) {
            axios.delete(`/api/post/${id}`,
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
