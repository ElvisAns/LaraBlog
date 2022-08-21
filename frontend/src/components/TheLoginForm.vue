<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 p-2">
                <img src="@/assets/logo.png" class="logo" />
                <h1 class="h-login">Welcome!</h1>
                <p class="small">
                    Welcome again!<br />Please login into your account
                </p>
                <form class="row g-3 needs-validation mt-3" novalidate>
                    <div class="col-md-12">
                        <label for="validationCustomUsername" class="form-label"
                            >Email</label
                        >
                        <div class="input-group has-validation">
                            <span
                                class="input-group-text"
                                id="inputGroupPrepend"
                                ><i class="bi bi-envelope-fill"></i
                            ></span>
                            <input
                                placeholder="johndoe@gmail.com"
                                type="text"
                                class="form-control"
                                id="validationCustomUsername"
                                aria-describedby="inputGroupPrepend"
                                required
                            />
                            <div class="invalid-feedback">
                                {{ error.email }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustomUsername" class="form-label"
                            >Password</label
                        >
                        <div class="input-group has-validation">
                            <span
                                class="input-group-text"
                                id="inputGroupPrepend"
                                ><i class="bi bi-key"></i
                            ></span>
                            <input
                                placeholder=""
                                type="password"
                                class="form-control"
                                id="validationCustomUsername"
                                aria-describedby="inputGroupPrepend"
                                required
                            />
                            <div class="invalid-feedback">
                                {{ error.password }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-success" type="submit">
                            Let me in! <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TheLoginForm",
    data() {
        return {
            error: {},
        };
    },
};
</script>

<style scoped>
.logo {
    height: 40px;
}
.h-login {
    font-family: "Dancing Script", cursive;
    font-size: 3em;
}
p.small {
    color: #157347;
}
</style>
