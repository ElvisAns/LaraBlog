<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 p-2">
                <img src="@/assets/logo.png" class="logo" />
                <h1 class="h-login">Welcome!</h1>
                <p class="small">
                    Welcome again!<br />Please login into your account
                </p>
                <form
                    class="row g-3 needs-validation mt-3"
                    @submit="login"
                    novalidate
                    ref="formContainer"
                    :class="formValidation"
                >
                    <div class="col-md-12">
                        <label for="em" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span
                                class="input-group-text"
                                id="inputGroupPrepend1"
                                ><i class="bi bi-envelope-fill"></i
                            ></span>
                            <input
                                v-model="email"
                                placeholder="johndoe@gmail.com"
                                type="text"
                                class="form-control"
                                aria-describedby="inputGroupPrepend1"
                                required
                                id="em"
                                :class="emailValidate"
                            />
                            <div class="invalid-feedback">
                                invalid email address
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="vp" class="form-label">Password</label>
                        <div class="input-group has-validation">
                            <span
                                class="input-group-text"
                                id="inputGroupPrepend2"
                                ><i class="bi bi-key"></i
                            ></span>
                            <input
                                v-model="password"
                                placeholder=""
                                type="password"
                                class="form-control"
                                aria-describedby="inputGroupPrepend2"
                                required
                                id="vp"
                                :class="passwordValidate"
                            />
                            <div class="invalid-feedback">invalid password</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button
                            class="btn btn-success"
                            :disabled="submit_disabled"
                            type="submit"
                        >
                            Let me in! <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { useToast } from "vue-toastification";
export default {
    name: "TheLoginForm",
    data() {
        return {
            email: "",
            password: "",
            emailValidate: "",
            passwordValidate: "",
            formValidation: "",
            fullPage: false,
            submit_disabled: false,
        };
    },
    methods: {
        login(event) {
            const emailPattern = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
            const toast = useToast();
            event.preventDefault();
            if (!emailPattern.test(this.email) || this.password.length < 5) {
                this.emailValidate = emailPattern.test(this.email)
                    ? "is-valid"
                    : "is-invalid";
                this.passwordValidate =
                    this.password.length > 5 ? "is-valid" : "is-invalid";
                return;
            }
            this.emailValidate = "is-valid";
            this.passwordValidate = "is-valid";
            this.formValidation = "was-validated";
            this.submit_disabled = true;
            let loader = this.$loading.show({
                container: this.fullPage ? null : this.$refs.formContainer,
                canCancel: false,
            });

            this.axios
                .post(`${process.env.VUE_APP_BACKEND_BASE_URL}/sanctum/token`, {
                    email: this.email,
                    password: this.password,
                    device_name: "DEFAULT", //TODO get the real name
                })
                .then((res) => {
                    console.log(res);
                    loader.hide();
                    toast.success("User logged in with sucess");
                    this.$store.commit("makeLogin", res.data.user_info); //backend reply with user datas
                    this.$cookies.set("session_info", res.data);
                    this.submit_disabled = false;
                    setTimeout(() => {
                        window.location.replace("/");
                    }, 2000);
                })
                // eslint-disable-next-line no-unused-vars
                .catch((error) => {
                    loader.hide();
                    toast.error(error.response.data.error);
                    this.submit_disabled = false;
                });
        },
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
