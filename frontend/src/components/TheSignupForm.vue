<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 p-2">
                <img src="@/assets/logo.png" class="logo" />
                <h1 class="h-login">Welcome!</h1>
                <p class="small">
                    Our blog is <br />Pleased, you decided to create an account
                </p>
                <form
                    class="row g-3 needs-validation mt-3"
                    @submit="login"
                    novalidate
                    ref="formContainer"
                    :class="formValidation"
                >
                    <div class="col-md-12">
                        <label for="no" class="form-label">Full Name</label>
                        <div class="input-group has-validation1">
                            <span
                                class="input-group-text"
                                id="inputGroupPrepend"
                                ><i class="bi bi-person"></i
                            ></span>
                            <input
                                v-model="name"
                                placeholder="John Doe"
                                type="text"
                                class="form-control"
                                aria-describedby="inputGroupPrepend1"
                                required
                                id="no"
                                :class="nameValidate"
                            />
                            <div class="invalid-feedback">
                                invalid name provided
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="em" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span
                                class="input-group-text"
                                id="inputGroupPrepend2"
                                ><i class="bi bi-envelope-fill"></i
                            ></span>
                            <input
                                v-model="email"
                                placeholder="johndoe@gmail.com"
                                type="text"
                                class="form-control"
                                aria-describedby="inputGroupPrepend2"
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

                    <div class="col-md-12">
                        <label for="vp2" class="form-label"
                            >Password Confirm</label
                        >
                        <div class="input-group has-validation">
                            <span
                                class="input-group-text"
                                id="inputGroupPrepend4"
                                ><i class="bi bi-key"></i
                            ></span>
                            <input
                                v-model="passwordCheck"
                                placeholder=""
                                type="password"
                                class="form-control"
                                aria-describedby="inputGroupPrepend4"
                                required
                                id="vp2"
                                :class="passwordCheckValidate"
                            />
                            <div class="invalid-feedback">
                                invalid confirm password
                            </div>
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
            name: "",
            passwordCheck: "",
            emailValidate: "",
            passwordValidate: "",
            nameValidate: "",
            passwordCheckValidate: "",
            formValidation: "",
            fullPage: false,
            submit_disabled: false,
        };
    },
    methods: {
        login(event) {
            const emailPattern = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
            const namePattern = /^[a-zA-Z]+ [a-zA-Z]+$/;
            const toast = useToast();
            event.preventDefault();
            if (
                !emailPattern.test(this.email) ||
                this.password.length < 5 ||
                this.passwordCheck !== this.password ||
                !namePattern.test(this.name)
            ) {
                this.emailValidate = emailPattern.test(this.email)
                    ? "is-valid"
                    : "is-invalid";
                this.passwordValidate =
                    this.password.length > 5 ? "is-valid" : "is-invalid";

                this.passwordCheckValidate =
                    (this.passwordValidate == "is-valid") &
                    (this.password == this.passwordCheck)
                        ? "is-valid"
                        : "is-invalid";
                this.nameValidate = namePattern.test(this.name)
                    ? "is-valid"
                    : "is-invalid";
                return;
            }
            this.emailValidate = "is-valid";
            this.passwordValidate = "is-valid";
            this.passwordCheckValidate = "is-valid";
            this.nameValidate = "is-valid";
            this.formValidation = "was-validated";
            this.submit_disabled = true;
            let loader = this.$loading.show({
                container: this.fullPage ? null : this.$refs.formContainer,
                canCancel: false,
            });

            this.axios
                .post(`${process.env.VUE_APP_BACKEND_BASE_URL}/user/create`, {
                    email: this.email,
                    password: this.password,
                    name: this.name,
                })
                // eslint-disable-next-line no-unused-vars
                .then((res) => {
                    loader.hide();
                    toast.success(
                        "User signed up in with sucess,you can go and login"
                    );
                    this.submit_disabled = false;
                })
                // eslint-disable-next-line no-unused-vars
                .catch((_error) => {
                    loader.hide();
                    toast.error(
                        "Error trying to signup with your informations"
                    );
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
