<!-- eslint-disable prettier/prettier -->
<template>
    <div class="landing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-white">
                        <h1>Welcome To Our official Blog</h1>
                        <button class="btn btn-success btn-space">GET STARTED</button>
                        <p  class="text-secondary">
                            We usually publish great news here, make sure you are tuned in!
                            <br>
                            Make sure you are tuned in, We usually publish great news here and then secure your place!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <h1 class="text-success fancy">Our Blogs Post</h1>
            </div>
        </div>
    </div>
    <TheBlogList :onlySample="isSample"/>
</template>

<script>
// @ is an alias to /src
import TheBlogList from "./TheBlogList";
export default {
    name: "LandingPage",
    components: {
        TheBlogList,
    },
    data() {
        return {
            isSample: false,
        };
    },
};
</script>

<style scoped>
.landing {
    height: 88%;
    width: 100%;
    background-color: rgb(33, 37, 41);
}
.landing {
    display: grid;
    place-items: center;
}
.btn-blue {
    background-color: rgb(59 151 246);
    color: white;
}
.btn-space {
    padding: 10px 40px;
    margin: 50px 50px;
}
.landing {
    background-image: radial-gradient(rgb(134, 134, 134) 1px, transparent 0);
    background-size: 40px 40px;
    background-position: -50% -19px;
    clip-path: polygon(0 0, 100% 0%, 100% 91%, 55% 98%, 0 100%);
}
.fancy {
    -webkit-text-decoration: rgb(134, 134, 134) double underline;
    text-decoration: rgb(134, 134, 134) double underline;
}
</style>
