<template>
    <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        data-bs-backdrop="static"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">
                        Post Action - {{ get_title }}
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="col-form-label">Title:</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="title"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Caption:</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="caption"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label"
                                >Illustration image URL:</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                v-model="image_url"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="text" class="col-form-label"
                                >Content:</label
                            >
                            <textarea
                                v-model="content"
                                class="form-control"
                                id="text"
                            ></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
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

                    <div>
                        <button
                            @click="set_current('create', -1)"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            class="btn btn-success my-1"
                        >
                            Create a new post
                        </button>
                    </div>
                    <h3 class="my-2">
                        Here is the list of current published blogs
                    </h3>
                    <div class="blog-crud table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scole="col">Edited on</th>
                                    <th scope="col">title</th>
                                    <th scope="col">caption</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="blog in blogs" :key="blog.id">
                                    <th scope="row">{{ blog.id }}</th>
                                    <td>{{ format_date(blog.updated_at) }}</td>
                                    <td>{{ blog.title }}</td>
                                    <td>{{ blog.caption }}</td>
                                    <td>
                                        <button
                                            @click="
                                                set_current('edit', blog.id)
                                            "
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            class="btn btn-success my-1"
                                        >
                                            Edit
                                        </button>
                                        <br />
                                        <button
                                            @click="
                                                set_current('delete', blog.id)
                                            "
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            class="btn btn-danger my-1"
                                        >
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
        set_current(action, id) {
            if (id == -1) {
                this.operation = "create";
            } else {
                this.operation = "edit";
                this.currID = id;
            }
        },
    },
    data() {
        return {
            user: this.$store.state.user,
            blogs: [],
            operation: "edit",
            currID: -1,
            title: "",
            caption: "",
            content: "",
            image_url: "",
        };
    },
    watch: {
        operation(newOps) {
            if (newOps == "create") {
                this.title = "";
                this.image_url = "";
                this.content = "";
                this.caption = "";
            }
        },
        currID(new_id) {
            if (new_id !== -1) {
                const blog = this.blogs.find((blog) => blog.id == new_id);
                this.title = blog.title;
                this.image_url = blog.image_url;
                this.content = blog.content;
                this.caption = blog.caption;
            } else {
                this.title = "";
                this.image_url = "";
                this.content = "";
                this.caption = "";
            }
        },
    },
    mounted() {
        this.axios
            .get(`${process.env.VUE_APP_BACKEND_BASE_URL}/posts`)
            .then((res) => {
                this.blogs = res.data;
            });
    },
    computed: {
        get_title() {
            return this.operation == "edit"
                ? `Edit # ${this.currID}`
                : "Create";
        },
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
.table-responsive {
    text-align: left;
}
</style>
