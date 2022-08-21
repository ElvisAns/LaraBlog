<template>
    <div class="d-flex mx-auto justify-content-center">
        <router-link to="/login" class="btn btn-success mx-1 btn-md px-4">
            login
        </router-link>
        <router-link to="/signin" class="btn btn-light mx-1 btn-md px-4">
            register
        </router-link>
    </div>
</template>

<script>
export default {
    name: "TheUserManager",
    props: {
        userLogin: {
            required: true,
            type: Boolean,
        },
    },
};
</script>
