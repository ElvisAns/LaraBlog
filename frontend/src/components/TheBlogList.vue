<template>
    <div class="container">
        <div class="row" ref="posts">
            <div class="col-12 loading-posts" v-show="!blogs">
                <div class="">
                    <div class="spinner-border" role="status"></div>
                </div>
            </div>
            <div
                v-for="blog in blogs"
                class="col-lg-4 col-md-12"
                :key="blog.id"
                :class="card_class"
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
                            :to="'/posts/read/' + blog.title.replace(/ /g, '-')"
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
            card_class: "",
        };
    },
    methods: {
        scrollToRef(refName) {
            var element = this.$refs[refName];
            var top = element.offsetTop;
            window.scrollTo({
                lef: 0,
                top: top,
                behavior: "smooth",
            });
        },
    },
    mounted() {
        if (this.onlySample) {
            this.axios
                .get(`http://127.0.0.1:8000/api/posts/3`)
                .then((request) => {
                    setTimeout(() => {
                        this.blogs = request.data;
                    }, 1000);
                    setTimeout(() => {
                        this.card_class = "animate__animated animate__shakeX";
                        this.scrollToRef("posts");
                    }, 2000);
                });
        } else {
            this.axios
                .get(`http://127.0.0.1:8000/api/posts/`)
                .then((request) => {
                    setTimeout(() => {
                        this.blogs = request.data;
                    }, 1000);
                    setTimeout(() => {
                        this.card_class = "animate__animated animate__shakeX";
                        this.scrollToRef("posts");
                    }, 2000);
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
