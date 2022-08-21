<template>
    <div class="container">
        <div class="row">
            <article
                class="col-md-8 offset-md-2 mt-5 bg-dark"
                :ref="blog_container"
            >
                {{ slug }}
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
    
    mounted() {
        let loader = this.$loading.show({
            container: this.$ref.blog_container,
            canCancel: false,
        });

        this.axios
            .get(
                `${process.env.VUE_APP_BACKEND_BASE_URL}/post/read/${this.slug}`
            )
            .then((res) => {
                setTimeout(() => {
                    loader.hide();
                }, 1000);
            });
    },
};
</script>
