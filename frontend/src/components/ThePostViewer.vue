<template>
    <div class="container">
        <div class="row">
            <article class="col-md-8 offset-md-2 mt-5" ref="blog_container">
                <div
                    v-show="error.length & data_fetched"
                    class="alert alert-danger d-flex align-items-center"
                    role="alert"
                >
                    <svg
                        class="bi flex-shrink-0 me-2"
                        width="24"
                        height="24"
                        role="img"
                        aria-label="Danger:"
                    >
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>{{ error }}</div>
                </div>
                <div v-show="data_fetched">
                    <img :src="post.image_url" />
                    <h1>{{ post.title }}</h1>
                </div>
            </article>
        </div>
    </div>
</template>

<script>
export default {
    name: "ThePostViewer",
    props: {
        slug: {
            required: true,
            type: String,
        },
    },
    data() {
        return {
            post: {},
            data_fetched: false,
            error: "",
        };
    },
    mounted() {
        console.log(this.$refs);
        let loader = this.$loading.show({
            container: this.$refs.blog_container,
            canCancel: false,
        });

        this.axios
            .get(
                `${process.env.VUE_APP_BACKEND_BASE_URL}/post/read/${this.slug}`
            )
            .then((res) => {
                this.post = res.data;
                this.data_fetched = true;
                setTimeout(() => {
                    loader.hide();
                }, 1000);
            })
            // eslint-disable-next-line no-unused-vars
            .catch((err) => {
                this.error =
                    "Error occured while fetching the post, seems like the post doesnt exist";
                this.data_fetched = true;
                loader.hide();
            });
    },
};
</script>
