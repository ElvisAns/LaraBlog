<!-- eslint-disable prettier/prettier -->
<template>
    <div class="container">
        <div class="landing">
            <h1>Welcome To Blog</h1>
            <p>We usually publish great news here, make sure you are tuned in!</p>
        </div>
    </div>
</template>

<script>
// @ is an alias to /src

export default {
    name: "LandingPage",
};
</script>

<style scoped>
.landing {
    height: 100%;
    width: 100%;
    background-color: rgb(33, 37, 41);
}
.landing {
    display: grid;
    place-items: center;
}
</style>
