<template>
    <div>
        <div
            class="modal"
            id="confirm_deletion"
            tabindex="-1"
            data-bs-backdrop="static"
            aria-labelledby="confirm_deletion"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure?</h5>
                        <button
                            ref="close_delete_modal"
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            cancel
                        </button>
                        <button
                            type="button"
                            class="btn btn-danger"
                            @click="delete_post"
                        >
                            Yes, delete the post N {{ currID }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="modal fade modal-lg"
            id="edit_create_modal"
            tabindex="-1"
            data-bs-backdrop="static"
            aria-labelledby="edit_create_modalLabel"
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
                                    rows="8"
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
                        <button
                            type="button"
                            class="btn btn-primary"
                            ref="saveButton"
                            @click="save"
                        >
                            Save
                        </button>
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
                                data-bs-target="#edit_create_modal"
                                class="btn btn-success my-1"
                            >
                                Create a new post
                            </button>
                        </div>
                        <h3 class="my-2">
                            Here is the list of current published blogs
                        </h3>
                        <div class="blog-crud table-responsive">
                            <table class="table table-striped table-bordered">
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
                                        <td>
                                            {{ format_date(blog.updated_at) }}
                                        </td>
                                        <td>{{ blog.title }}</td>
                                        <td>{{ blog.caption }}</td>
                                        <td>
                                            <button
                                                @click="
                                                    set_current('edit', blog.id)
                                                "
                                                data-bs-toggle="modal"
                                                data-bs-target="#edit_create_modal"
                                                class="btn btn-success my-1"
                                            >
                                                Edit
                                            </button>
                                            <br />
                                            <button
                                                @click="
                                                    set_current(
                                                        'delete',
                                                        blog.id
                                                    )
                                                "
                                                data-bs-toggle="modal"
                                                data-bs-target="#confirm_deletion"
                                                class="btn btn-danger my-1"
                                            >
                                                Delete
                                            </button>
                                            <br />
                                            <router-link
                                                :to="
                                                    '/posts/read/' +
                                                    blog.title.replace(
                                                        / /g,
                                                        '-'
                                                    )
                                                "
                                            >
                                                View post
                                            </router-link>
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
    </div>
</template>

<script>
import { useToast } from "vue-toastification";
export default {
    name: "TheUserProfile",
    methods: {
        delete_post() {
            const cookie = this.$cookies.get("session_info");
            const config = {
                headers: { Authorization: `Bearer ${cookie.token}` },
            };
            const toast = useToast();
            this.axios
                .get(
                    `${process.env.VUE_APP_BACKEND_BASE_URL}/posts/delete/${this.currID}`,
                    config
                )
                .then(() => {
                    toast.success("Deleted");
                })
                .catch(() => {
                    toast.error("Error occuring, try again!");
                })
                .finally(() => {
                    this.$refs.close_delete_modal.click();
                    this.axios
                        .get(`${process.env.VUE_APP_BACKEND_BASE_URL}/posts`)
                        .then((res) => {
                            this.blogs = res.data;
                        });
                });
        },
        save() {
            const cookie = this.$cookies.get("session_info");
            const config = {
                headers: { Authorization: `Bearer ${cookie.token}` },
            };
            const toast = useToast();
            const url_pattern =
                /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w.-]+)+[\w\-._~:/?#[\]@!$&'()*+,;=.]+$/;
            if (
                this.title.length < 5 ||
                !url_pattern.test(this.image_url) ||
                this.caption.length < 15 ||
                this.content.length < 20
            ) {
                toast.warning(
                    "You have entered incorrect datas! please make sure you fill the form with the right datas"
                );
                return;
            }
            const load = this.$loading.show({
                container: this.$refs.saveButton,
                canCancel: false,
                height: "20px",
            });
            if (this.operation == "edit") {
                this.axios
                    .post(
                        `${process.env.VUE_APP_BACKEND_BASE_URL}/posts/update/${this.currID}`,
                        {
                            title: this.title,
                            caption: this.caption,
                            image_url: this.image_url,
                            content: this.content,
                        },
                        config
                    )
                    .then(() => {
                        toast.success("Post updated with success");
                    })
                    .catch(() => {
                        toast.error(
                            "Error updating the post, please check your informatons"
                        );
                    })
                    .finally(() => {
                        this.axios
                            .get(
                                `${process.env.VUE_APP_BACKEND_BASE_URL}/posts`
                            )
                            .then((res) => {
                                this.blogs = res.data;
                            });
                        load.hide();
                    });
            } else {
                this.axios
                    .post(
                        `${process.env.VUE_APP_BACKEND_BASE_URL}/posts/create`,
                        {
                            title: this.title,
                            caption: this.caption,
                            image_url: this.image_url,
                            content: this.content,
                            category: 1,
                            user_id: this.user.id,
                        },
                        config
                    )
                    .then(() => {
                        toast.success("Post created with success");
                    })
                    .catch(() => {
                        toast.error(
                            "Error creating the post, please check your informatons"
                        );
                    })
                    .finally(() => {
                        this.axios
                            .get(
                                `${process.env.VUE_APP_BACKEND_BASE_URL}/posts`
                            )
                            .then((res) => {
                                this.blogs = res.data;
                            });
                        load.hide();
                    });
            }
        },
        format_date(Unformateddate) {
            const d = new Date(Unformateddate);
            return d.toLocaleString();
        },
        set_current(action, id) {
            if (id == -1) {
                this.operation = "create";
            } else {
                this.operation = action;
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
    top: -20px;
}
.table-responsive {
    text-align: left;
}
</style>
