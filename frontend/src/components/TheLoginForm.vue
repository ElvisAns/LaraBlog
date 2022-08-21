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
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label"
                            >City</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="validationCustom03"
                            required
                        />
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label"
                            >State</label
                        >
                        <select
                            class="form-select"
                            id="validationCustom04"
                            required
                        >
                            <option selected disabled value="">
                                Choose...
                            </option>
                            <option>...</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label"
                            >Zip</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="validationCustom05"
                            required
                        />
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="invalidCheck"
                                required
                            />
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">
                            Submit form
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
