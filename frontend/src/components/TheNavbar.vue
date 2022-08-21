<template>
    <div class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 my-3">
                    <nav
                        class="navbar navbar-expand-lg navbar-dark bg-dark text-white"
                    >
                        <div class="container-fluid">
                            <router-link class="navbar-brand" to="/">
                                <i class="bi bi-slack"></i> OurBlog
                            </router-link>
                            <button
                                class="navbar-toggler"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarTogglerDemo02"
                                aria-controls="navbarTogglerDemo02"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                            >
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div
                                class="collapse navbar-collapse"
                                id="navbarTogglerDemo02"
                            >
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <router-link
                                            class="nav-link active"
                                            aria-current="page"
                                            to="/"
                                        >
                                            <i class="bi bi-house-fill"></i>
                                            Home
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link
                                            class="nav-link"
                                            aria-current="page"
                                            to="/"
                                        >
                                            <i class="bi bi-bookmark"></i>
                                            Posts
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link
                                            class="nav-link"
                                            aria-current="page"
                                            to="/"
                                        >
                                            <i class="bi bi-chat-left"></i>
                                            Contact us
                                        </router-link>
                                    </li>
                                </ul>
                                <TheUserManager />
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TheUserManager from "./TheUserManager";
export default {
    name: "TheNavBar",
    components: {
        TheUserManager,
    },
    data() {
        return {
            logginState: this.$store.state.isLoggedIn,
        };
    },
};
</script>

<style scoped>
.navbar-brand {
    margin-right: 60px;
}
.nav-item {
    padding: 0px 10px;
}
</style>
