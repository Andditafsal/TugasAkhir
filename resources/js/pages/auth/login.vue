<script>
export default {
    data() {
        return {
            form: {
                email: "",
                password: "",
            },
            error: {},
        };
    },
    methods: {
        handleSubmit() {
            this.error = {};
            this.$store
                .dispatch("postData", ["auth/login", this.form])
                .then((result) => {
                    window.location.href = "/";
                    //console.log(result);
                })
                .catch((error) => {
                    if (error.response.data.statusCode == 400) {
                        this.error = error.response.data;
                    } else {
                        this.error = error.response.data.messages;
                    }
                });
        },
    },
};
</script>

<template>
    <body class="vh-100">
        <div class="authincation h-100">
            <div class="container h-100">
                <div
                    class="row justify-content-center h-100 align-items-center mb-100"
                >
                    <div class="col-md-5">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <h4 class="text-center mb-4">Login</h4>
                                        <p class="text-center pertama">
                                            Gunakan akun anda untuk akses lebih
                                            lanjut
                                        </p>
                                        <div
                                            class="alert alert-danger"
                                            v-if="error.statusCode == 400"
                                        >
                                            {{ error.messages }}
                                        </div>
                                        <form
                                            @submit.prevent="handleSubmit"
                                            class="user"
                                        >
                                            <!-- Start form -->
                                            <div class="form-group">
                                                <label class="mb-1"
                                                    ><strong
                                                        >Email</strong
                                                    ></label
                                                >
                                                <input
                                                    type="email"
                                                    class="form-control form-control-user"
                                                    placeholder="email"
                                                    v-model="form.email"
                                                    :class="{
                                                        'is-invalid':
                                                            error.email,
                                                    }"
                                                />
                                                <div
                                                    class="invalid-feedback"
                                                    v-for="(
                                                        erorr, index
                                                    ) in error.email"
                                                    :key="index"
                                                >
                                                    {{ erorr }}
                                                </div>
                                            </div>
                                            <!-- End form -->
                                            <!-- start form -->
                                            <div class="form-group">
                                                <label class="mb-1"
                                                    ><strong
                                                        >password</strong
                                                    ></label
                                                >
                                                <input
                                                    type="password"
                                                    class="form-control form-control-user"
                                                    placeholder="Password"
                                                    v-model="form.password"
                                                    :class="{
                                                        'is-invalid':
                                                            error.password,
                                                    }"
                                                />
                                                <div
                                                    class="invalid-feedback"
                                                    v-for="(
                                                        erorr, index
                                                    ) in error.password"
                                                    :key="index"
                                                >
                                                    {{ erorr }}
                                                </div>
                                            </div>
                                            <!-- end from -->

                                            <div class="text-center">
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary btn-block"
                                                >
                                                    Login
                                                </button>
                                            </div>
                                        </form>
                                        <div
                                            class="new-account mt-3 text-center"
                                        >
                                            <p>
                                                Belum punya akun?
                                                <router-link
                                                    to="/auth/register"
                                                    class="text-primary"
                                                    >Daftar
                                                    Sekarang!</router-link
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>
<style>
.pertama {
    color: darkgrey;
}
</style>
