<template>
    <div class="container">
        <div class="row">
            <article class="col-md-8 offset-md-2 mt-5" ref="blog_container">
                <div v-show="error.length & data_fetched">
                    <div
                        class="alert alert-danger d-flex align-items-center"
                        role="alert"
                    >
                        <i class="bi bi-exclamation-octagon"></i>
                        <div>{{ error }}</div>
                    </div>
                </div>
                <div v-show="data_fetched">
                    <div class="caption_container">
                        <img :src="blog.image_url" class="post-caption" />
                    </div>
                    <h1>{{ blog.title }}</h1>
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
            blog: {},
            data_fetched: false,
            error: "",
        };
    },
    mounted() {
        let loader = this.$loading.show({
            container: this.$refs.blog_container,
            canCancel: false,
        });

        this.axios
            .get(
                `${process.env.VUE_APP_BACKEND_BASE_URL}/posts/read/${this.slug}`
            )
            .then((res) => {
                this.blog = res.data.post;
                console.log(res.data.post);
                this.data_fetched = true;
                setTimeout(() => {
                    loader.hide();
                }, 1000);
            })
            // eslint-disable-next-line no-unused-vars
            .catch((err) => {
                setTimeout(() => {
                    this.error =
                        "Error occured while fetching the post, seems like the post doesnt exist";
                    this.data_fetched = true;
                    loader.hide();
                }, 1000);
            });
    },
};
</script>
