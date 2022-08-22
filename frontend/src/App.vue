<template>
    <div class="main">
        <TheNavbar />
        <router-view />
        <TheFooter />
    </div>
</template>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}
.main {
    height: 100%;
}

nav {
    padding: 30px;
}

nav a {
    font-weight: bold;
    color: #2c3e50;
}

nav a.router-link-exact-active {
    color: #42b983;
}
</style>

<script>
import TheNavbar from "./components/TheNavbar";
import TheFooter from "./components/TheFooter";
export default {
    components: {
        TheNavbar,
        TheFooter,
    },
    beforeMount() {
        if (this.$cookies.get("session_info")) {
            const cookie = this.$cookies.get("session_info");
            this.$store.commit("makeLogin", cookie.user_info);
        }
    },
};
</script>
