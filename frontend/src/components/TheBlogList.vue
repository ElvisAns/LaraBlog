<template>
    <div class="container">
        <div class="row">
            <div class="col-12 loading-posts" v-show="!blogs">
                <div class="">
                    <div class="spinner-border" role="status"></div>
                </div>
            </div>
            <div
                v-for="blog in blogs"
                class="col-lg-4 col-md-12"
                :key="blog.id"
            >
                <div class="card m-4 mx-auto shadow-lg" style="width: 18rem">
                    <img :src="blog.image_url" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">{{ blog.title }}</h5>
                        <p class="card-text">
                            {{ blog.caption }}
                        </p>
                        <router-link
                            class="btn w-100 btn-success"
                            :to="'/posts/read/' + blog.id"
                            >Read</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TheBlogList",
    props: {
        onlySample: {
            default: true,
            type: Boolean,
        },
    },
    data() {
        return {
            blogs: null,
        };
    },
    mounted() {
        if (this.onlySample) {
            this.axios
                .get(`http://127.0.0.1:8000/api/posts/3`)
                .then((request) => {
                    this.blogs = request.data;
                });
        } else {
            this.axios
                .get(`http://127.0.0.1:8000/api/posts/`)
                .then((request) => {
                    this.blogs = request.data;
                });
        }
    },
};
</script>

<style scoped>
.loading-posts {
    display: grid;
    place-items: center;
    height: 200px;
}
</style>
