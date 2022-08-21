<template>
    <div v-show="!userIsLoggedIn">
        <div class="d-flex mx-auto justify-content-center">
            <router-link
                to="auth/login"
                class="btn btn-success mx-1 btn-md px-4"
            >
                login
            </router-link>
            <router-link
                to="auth/signin"
                class="btn btn-light mx-1 btn-md px-4"
            >
                register
            </router-link>
        </div>
    </div>
    <div v-show="userIsLoggedIn">
        <div class="d-flex mx-auto justify-content-center">
            <router-link to="auth/logout" class="btn btn-success mx-1 btn-md px-4">
                logout
            </router-link>
            <router-link to="/signin" class="btn btn-light mx-1 btn-md px-4">
                profile
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "TheUserManager",
    props: {
        userIsLoggedIn: {
            required: true,
            type: Boolean,
            default: false,
        },
    },
};
</script>
