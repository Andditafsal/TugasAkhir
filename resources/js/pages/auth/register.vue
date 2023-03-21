<script>
export default {
    data() {
        return {
            form: {
                name: "",
                email: "",
                jabatan: "",
                alamat: "",
                noHp: "",
                password: "",
            },
            error: {},
        };
    },
    methods: {
        handleSubmit() {
            this.error = {};
            this.$store
                .dispatch("postData", ["auth/register", this.form])
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
                                        <h4 class="text-center mb-4">
                                            Daftar akun
                                        </h4>
                                        <p class="text-center pertama">
                                            Daftarkan akun anda untuk mengakses
                                            lebih lanjut
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
                                                        >Nama Lengkap</strong
                                                    ></label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control form-control-user"
                                                    placeholder="Nama Lengkap"
                                                    v-model="form.name"
                                                    :class="{
                                                        'is-invalid':
                                                            error.name,
                                                    }"
                                                />
                                                <div
                                                    class="invalid-feedback"
                                                    v-for="(
                                                        erorr, index
                                                    ) in error.name"
                                                    :key="index"
                                                >
                                                    {{ erorr }}
                                                </div>
                                            </div>
                                            <!-- End form -->
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
                                                    placeholder="Email"
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
                                                        >Jabatan</strong
                                                    ></label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control form-control-user"
                                                    placeholder="Jabatan"
                                                    v-model="form.jabatan"
                                                    :class="{
                                                        'is-invalid':
                                                            error.jabatan,
                                                    }"
                                                />
                                                <div
                                                    class="invalid-feedback"
                                                    v-for="(
                                                        erorr, index
                                                    ) in error.jabatan"
                                                    :key="index"
                                                >
                                                    {{ erorr }}
                                                </div>
                                            </div>
                                            <!-- end from -->
                                            <!-- start form -->
                                            <div class="form-group">
                                                <label class="mb-1"
                                                    ><strong
                                                        >No Hp</strong
                                                    ></label
                                                >
                                                <input
                                                    type="intejer"
                                                    class="form-control form-control-user"
                                                    placeholder="Nohp"
                                                    v-model="form.noHp"
                                                    :class="{
                                                        'is-invalid':
                                                            error.noHp,
                                                    }"
                                                />
                                                <div
                                                    class="invalid-feedback"
                                                    v-for="(
                                                        erorr, index
                                                    ) in error.noHp"
                                                    :key="index"
                                                >
                                                    {{ erorr }}
                                                </div>
                                            </div>
                                            <!-- end from -->
                                            <!-- start form -->
                                            <div class="form-group">
                                                <label class="mb-1"
                                                    ><strong
                                                        >Alamat</strong
                                                    ></label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control form-control-user"
                                                    placeholder="Alamat"
                                                    v-model="form.alamat"
                                                    :class="{
                                                        'is-invalid':
                                                            error.alamat,
                                                    }"
                                                />
                                                <div
                                                    class="invalid-feedback"
                                                    v-for="(
                                                        erorr, index
                                                    ) in error.alamat"
                                                    :key="index"
                                                >
                                                    {{ erorr }}
                                                </div>
                                            </div>
                                            <!-- end from -->
                                            <!-- start form -->
                                            <div class="form-group">
                                                <label class="mb-1"
                                                    ><strong
                                                        >Password</strong
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
                                                    Daftar
                                                </button>
                                            </div>
                                        </form>
                                        <div
                                            class="new-account mt-3 text-center"
                                        >
                                            <p>
                                                Sudah punya akun?
                                                <router-link
                                                    to="/auth/login"
                                                    class="text-primary"
                                                    >Login
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
