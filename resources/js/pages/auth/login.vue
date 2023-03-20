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
    <body class="bg-primary">
        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content">
                            <div class="login-logo">
                                <span>Logo</span>
                            </div>
                            <div class="login-form">
                                <h2 class="text-center">Login</h2>
                                <p class="text-center">
                                    Gunakan akun anda untuk akses lebih lanjut
                                    {{ error }}
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
                                    <div class="form-group">
                                        <label class="text-capitalize"
                                            >Email</label
                                        >
                                        <input
                                            type="email"
                                            class="form-control form-control-user"
                                            placeholder="Email"
                                            v-model="form.email"
                                            :class="{
                                                'is-invalid': error.email,
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
                                    <div class="form-group">
                                        <label class="text-capitalize"
                                            >Password</label
                                        >
                                        <input
                                            type="password"
                                            class="form-control form-control-user"
                                            placeholder="Password"
                                            v-model="form.password"
                                            :class="{
                                                'is-invalid': error.password,
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

                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-flat m-b-30 m-t-30 text-capitalize"
                                    >
                                        Login
                                    </button>
                                </form>

                                <div class="text-center">
                                    <router-link
                                        to="/auth/register"
                                        class="small"
                                        ><p>
                                            Belum punya akun? Daftar Sekarang!!
                                        </p></router-link
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>
