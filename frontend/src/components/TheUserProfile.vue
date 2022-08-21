<template>
    <div class="container">
        <div class="row">
            <article class="col-md-8 offset-md-2 mt-5">
                <div>
                    <div class="cover-container">
                        <img
                            src="https://static.vecteezy.com/system/resources/previews/001/589/630/original/green-background-with-fading-square-and-dots-free-vector.jpg"
                            class="cover-image"
                        />
                    </div>
                    <div class="user-avatar">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h1 class="user-name">{{ user.name }}</h1>
                    <div class="text-secondary">
                        <strong>Joigned on </strong>
                        <time :datetime="user.created_at">
                            <i class="bi bi-clock"></i>
                            {{ format_date(user.created_at) }}
                        </time>
                    </div>

                    <div class="text-secondary">
                        <time :datetime="user.created_at">
                            <i class="bi bi-envelope"></i>
                            {{ user.email }}
                        </time>
                    </div>

                    @openModal to create a new post
                    <h3 class="my-2">
                        Here is the list of current published blogs
                    </h3>
                    <div class="blog-crud table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">title</th>
                                    <th scope="col">caption</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="blog in blogs" :key="blog.id">
                                    <th scope="row">{{ blog.id }}</th>
                                    <td>{{ blog.title }}</td>
                                    <td>{{ blog.caption }}</td>
                                    <td>
                                        <button class="btn btn-success my-1">
                                            Edit
                                        </button>
                                        <br />
                                        <button class="btn btn-danger my-1">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-left">
                        <router-link
                            class="btn btn-success"
                            aria-current="page"
                            to="/"
                            slots="button"
                        >
                            <i class="bi bi-box-arrow-in-left"></i>
                            Get back home
                        </router-link>
                    </div>
                </div>
            </article>
        </div>
    </div>
</template>

<script>
export default {
    name: "TheUserProfile",
    methods: {
        format_date(Unformateddate) {
            const d = new Date(Unformateddate);
            return d.toLocaleString();
        },
    },
    data() {
        return {
            user: this.$store.state.user,
        };
    },
    mounted(){
        
    }
};
</script>
<style scoped>
.cover-container {
    max-height: 220px;
    overflow: hidden;
    width: 100%;
    margin: 10px 0px;
}
.cover-image {
    width: 100%;
}
.user-name {
    font-weight: 900;
    font-size: 2em;
}
.blog-content {
    padding-top: 10px;
    text-align: justify;
}
.user-avatar {
    font-size: 90px;
    display: block;
    position: relative;
    top: -50px;
}
</style>
