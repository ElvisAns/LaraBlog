<template>
    <div class="container">
        <div class="row">
            <div
                v-for="blog in blogs"
                class="col-lg-4 col-md-12"
                :key="blog.id"
            >
                <div class="card" style="width: 18rem">
                    <img
                        src="{{ blog.image_url }}"
                        class="card-img-top"
                        alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ blog.title }}</h5>
                        <p class="card-text">
                            {{ blog.caption }}
                        </p>
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
        blogs: {
            required: true,
            type: Array,
        },
    },
};
</script>
