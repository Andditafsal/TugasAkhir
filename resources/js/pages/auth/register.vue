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
                                <h2 class="text-center">Daftar Akun</h2>
                                <p class="text-center">
                                    Daftarkan akun anda untuk akses lebih lanjut
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
                                            >Nama Lengkap</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control form-control-user"
                                            placeholder="nama lengkap"
                                            v-model="form.name"
                                            :class="{
                                                'is-invalid': error.name,
                                            }"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-for="(erorr, index) in error.name"
                                            :key="index"
                                        >
                                            {{ erorr }}
                                        </div>
                                    </div>
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
                                            >Jabatan</label
                                        >
                                        <input
                                            type="jabatan"
                                            class="form-control form-control-user"
                                            placeholder="jabatan"
                                            v-model="form.jabatan"
                                            :class="{
                                                'is-invalid': error.jabatan,
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
                                    <div class="form-group">
                                        <label class="text-capitalize"
                                            >No Hp</label
                                        >
                                        <input
                                            type="noHp"
                                            class="form-control form-control-user"
                                            placeholder="no hp"
                                            v-model="form.noHp"
                                            :class="{
                                                'is-invalid': error.noHp,
                                            }"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-for="(erorr, index) in error.noHp"
                                            :key="index"
                                        >
                                            {{ erorr }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-capitalize"
                                            >Alamat</label
                                        >
                                        <input
                                            type="alamat"
                                            class="form-control form-control-user"
                                            placeholder="alamat"
                                            v-model="form.alamat"
                                            :class="{
                                                'is-invalid': error.alamat,
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
                                            ) in error.password"
                                            :key="index"
                                        >
                                            {{ erorr }}
                                        </div>
                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-flat m-b-30 m-t-30 text-capitalize"
                                    >
                                        Daftar
                                    </button>
                                </form>

                                <div class="text-center">
                                    <router-link to="/auth/login" class="small"
                                        ><span>
                                            Sudah punya akun? Login!
                                        </span></router-link
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
