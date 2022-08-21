<template>
    <div class="container">
        <div class="row">
            <article class="col-md-8 offset-md-2 mt-5" ref="blog_container">
                <div>
                    <div class="cover-container">
                        <img src="https://static.vecteezy.com/system/resources/previews/001/589/630/original/green-background-with-fading-square-and-dots-free-vector.jpg" class="cover-image" />
                    </div>
                    <div class="user-avatar"><i class="bi bi-person-circle"></i></div>
                    <h1 class="user-name">{{ user.name }}</h1>
                    <div class="text-secondary">
                        Joigned on
                        <time :datetime="blog.created_at">
                            <i class="bi bi-clock"></i>
                            {{ format_date(user.created_at) }}
                        </time>
                    </div>

                    <div class="text-secondary">
                        contact
                        <time :datetime="blog.created_at">
                            <i class="bi bi-enveloppe"></i>
                            {{ user.email }}
                        </time>
                    </div>

                    @openModal to create a new post
                    <div class="blog-content">
                        @Table with crud operation
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
};
</script>
<style scoped>
.cover-container {
    max-height: 220px;
    overflow: hidden;
    width: 100%;
    margin: 10px 0px;
}
.cover-image{
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
}
</style>
