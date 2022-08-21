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
                        >
                            <i class="bi bi-box-arrow-right"></i>
                            Read
                        </router-link>
                    </div>
                    <div class="card-footer">
                        <time :datetime="blog.created_at">
                            <i class="bi bi-clock"></i>
                            {{ format_date(blog.created_at) }}
                        </time>
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
            first_render: true,
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
        format_date(Unformateddate) {
            const d = new Date(Unformateddate);
            return d.toLocaleString();
        },
    },
    mounted() {
        if (this.onlySample) {
            this.axios
                .get(`${process.env.VUE_APP_BACKEND_BASE_URL}/posts/3`)
                .then((request) => {
                    setTimeout(() => {
                        this.blogs = request.data;
                    }, 1000);
                    setTimeout(() => {
                        this.card_class = "animate__animated animate__fadeIn";
                        if (!this.first_render) this.scrollToRef("posts");
                        this.first_render = false;
                    }, 1500);
                });
        } else {
            this.axios
                .get(`${process.env.VUE_APP_BACKEND_BASE_URL}/posts/`)
                .then((request) => {
                    setTimeout(() => {
                        this.blogs = request.data;
                    }, 1000);
                    setTimeout(() => {
                        this.card_class = "animate__animated animate__fadeIn";
                        if (!this.first_render) this.scrollToRef("posts");
                        this.first_render = false;
                    }, 1500);
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
