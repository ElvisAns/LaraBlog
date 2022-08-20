<!-- eslint-disable prettier/prettier -->
<template>
    <div class="landing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-white">
                        <h1>Welcome Our To Blog</h1>
                        <button class="btn btn-blue btn-space">GET STARTED</button>
                        <p  class="text-secondary">
                            We usually publish great news here, make sure you are tuned in!
                            We usually publish great news here, make sure you are tuned in!
                        </p>
                    </div>
                </div>
            </div>
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
</style>
