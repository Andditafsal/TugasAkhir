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
    <body class="account-page">
        <div class="main-wrapper">
            <div class="account-content">
                <div class="container">
                    <div class="account-box">
                        <div class="account-wrapper">
                            <h3 class="account-title">Login</h3>
                            <p class="account-subtitle">
                                Gunakan akun anda untuk akses lebih lanjut!
                            </p>
                            <div
                                class="alert alert-danger"
                                v-if="error.statusCode == 400"
                            >
                                {{ error }}
                            </div>

                            <form class="user">
                                <div class="form-group">
                                    <input
                                        class="form-control from-control-user"
                                        type="text"
                                        :class="{
                                            'is-invalid': error.email,
                                        }"
                                        aria-describedby="emailHelp"
                                        placeholder="Email"
                                        v-model="form.email"
                                    />
                                    <div
                                        class="invalid-feedback"
                                        v-for="(erorr, index) in error.email"
                                        :key="index"
                                    >
                                        {{ erorr }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input
                                        class="form-control from-control-user"
                                        type="password"
                                        :class="{
                                            'is-invalid': error.password,
                                        }"
                                        aria-describedby="password"
                                        placeholder="Password"
                                        v-model="form.password"
                                    />
                                    <div
                                        class="invalid-feedback"
                                        v-for="(erorr, index) in error.password"
                                        :key="index"
                                    >
                                        {{ erorr }}
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button
                                        class="btn btn-primary account-btn"
                                        type="submit"
                                    >
                                        Login
                                    </button>
                                </div>
                                <div class="account-footer">
                                    <p>
                                        Belum Punya Akun?
                                        <router-link
                                            to="/auth/register"
                                            class="text-primary"
                                            >Daftar Sekarang!</router-link
                                        >
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>
