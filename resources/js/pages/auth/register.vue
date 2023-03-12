<script>
export default {
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
            },
            error: {},
        };
    },
    methods: {
        handleSubmit() {
            this.$store
                .dispatch("postData", ["auth/register", this.form])
                .then((result) => {
                    this.$router.push("/auth/login");
                })
                .catch((error) => {
                    this.error = error.response.data.messages;
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
                                <h1 class="h4 text-gray-900 mb-4">
                                    Register Acount
                                </h1>
                            </div>
                            <form @submit.prevent="handleSubmit" class="user">
                                <div class="form-group">
                                    <input
                                        type="teks"
                                        class="form-control form-control-user"
                                        :class="{ 'is-invalid': error.name }"
                                        placeholder="Full Name"
                                        v-model="form.name"
                                    />
                                    <div
                                        class="invalid-feedbeck"
                                        v-for="(erorr, index) in error.name"
                                        :key="index"
                                    >
                                        {{ erorr }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input
                                        type="email"
                                        class="form-control form-control-user"
                                        :class="{ 'is-invalid': error.email }"
                                        placeholder="Email Address"
                                        v-model="form.email"
                                    />
                                    <div
                                        class="invalid-feedbeck"
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
                                        :class="{
                                            'is-invalid': error.password,
                                        }"
                                        placeholder="password"
                                        v-model="form.password"
                                    />
                                    <div
                                        class="invalid-feedbeck"
                                        v-for="(erorr, index) in error.password"
                                        :key="index"
                                    >
                                        {{ erorr }}
                                    </div>
                                </div>
                                <button
                                    class="btn btn-primary btn-user btn-block"
                                >
                                    Register Account
                                </button>
                            </form>
                            <hr />

                            <div class="text-center">
                                <router-link to="/auth/login" class="small"
                                    >Already have an account?
                                    Login!</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
