<!-- eslint-disable vue/no-deprecated-router-link-tag-prop -->
<template>
    <div class="landing">
        <div class="container">
            <div class="row">
                <div class="col-12" :class="animation_main">
                    <div class="text-white">
                        <h1>Welcome To Our official Blog</h1>
                        <router-link
                            to="/auth/signup"
                            tag="button"
                            class="btn btn-success btn-space"
                        >
                            GET STARTED
                        </router-link>
                        <p class="text-secondary">
                            We usually publish great news here, make sure you
                            are tuned in!
                            <br />
                            Make sure you are tuned in, We usually publish great
                            news here and then secure your place!
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button
                    @click="toggleSample"
                    class="my-5 btn btn-md btn-dark shadow-lg load"
                >
                    {{ buttonText }}
                </button>
            </div>
        </div>
    </div>
    <TheBlogList :onlySample="isSample" :key="keyComp" />
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
            isSample: true,
            keyComp: 1,
            buttonText: "See All posts",
            animation_main: "",
        };
    },
    mounted() {
        this.animation_main = "animate__animated animate__bounceIn";
    },
    methods: {
        toggleSample() {
            this.isSample = !this.isSample;
            this.keyComp++;
            this.buttonText = this.isSample ? "See All posts" : "Load less";
        },
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
    font-weight: bolder;
    letter-spacing: 2px;
}
.load {
    width: 200px;
}
</style>
