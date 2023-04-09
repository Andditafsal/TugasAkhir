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
    <div class="container">
        <div class="card o-hidden border-0 col-lg-7 shadow-lg my-5 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                <h6 class="text-gray-500 mb-4">
                                    Gunakan akun anda untuk akses lebih lanjut!
                                </h6>
                            </div>
                            <div
                                class="alert alert-danger"
                                v-if="error.statusCode == 400"
                            >
                                {{ error }}
                            </div>
                            <form @submit.prevent="handleSubmit" class="user">
                                <div class="form-group">
                                    <input
                                        type="email"
                                        class="form-control form-control-user"
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
                                        v-for="(erorr, index) in error.password"
                                        :key="index"
                                    >
                                        {{ erorr }}
                                    </div>
                                </div>
                                <button
                                    class="btn btn-primary btn-user btn-block"
                                >
                                    Login
                                </button>
                            </form>
                            <hr />
                            <div class="text-center">
                                <span
                                    >Belum Punya Aku?
                                    <router-link
                                        to="/auth/register"
                                        class="small"
                                    >
                                        <span
                                            >Daftar Sekarang!</span
                                        ></router-link
                                    >
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
