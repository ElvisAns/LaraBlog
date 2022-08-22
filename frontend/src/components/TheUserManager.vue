<template>
    <div>
        <div v-show="!userIsLoggedIn">
            <div class="d-flex mx-auto justify-content-center">
                <router-link
                    to="/auth/login"
                    class="btn btn-success mx-1 btn-md px-4"
                >
                    login
                </router-link>
                <router-link
                    to="/auth/signup"
                    class="btn btn-light mx-1 btn-md px-4"
                >
                    register
                </router-link>
            </div>
        </div>
        <div v-show="userIsLoggedIn">
            <div class="d-flex mx-auto justify-content-center">
                <button
                    @click="logout"
                    class="btn btn-success mx-1 btn-md px-4"
                >
                    logout
                </button>
                <router-link
                    to="/user/profile"
                    class="btn btn-light mx-1 btn-md px-4"
                >
                    <i class="bi bi-person-circle"></i> profile - {{ getName }}
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TheUserManager",
    data() {
        return {
            userIsLoggedIn: this.$store.getters.getUserLoginState,
            user: this.$store.getters.getUser,
        };
    },
    computed: {
        getName() {
            if (!Object.keys(this.user).length) {
                return "";
            } else {
                return this.user.name;
            }
        },
    },
    methods: {
        logout() {
            this.$store.commit("makeLogout");
            this.$cookies.remove("session_info");
            window.location.replace("/");
        },
    },
};
</script>
