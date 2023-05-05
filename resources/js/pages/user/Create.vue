<script>
export default {
    data() {
        return {
            form: {
                name: "",
                email: "",
                id_role: "",
                jenis_kelamin: "",
                alamat: "",
                noHp: "",
                password: "",
                picture: "",
            },
            error: {},
            isDisabled: false,
        };
    },
    methods: {
        handleSubmit() {
            this.isDisabled = true;

            let formData = new FormData();
            formData.append("name", this.form.name);
            formData.append("email", this.form.email);
            formData.append("id_role", this.form.id_role);
            formData.append("jenis_kelamin", this.form.jenis_kelamin);
            formData.append("alamat", this.form.alamat);
            formData.append("no_hp", this.form.noHp);
            formData.append("password", this.form.password);
            formData.append("picture", this.form.picture);

            this.$store
                .dispatch("postDataUpload", ["user", formData])
                .then((result) => {
                    //this.$router.push("/auth/login");
                    this.isDisabled = false;
                    this.$router.push({ name: "User" });
                    //console.log(result);
                })
                .catch((error) => {
                    this.isDisabled = false;
                    this.error = error.response.data.messages;
                    //console.log(error);
                });
        },
        uploadPicture(e) {
            this.form.picture = e.target.files[0];
        },
    },
};
</script>
<template>
    <!-- Start Component -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-12 card-judul">
            <h5 class="h5 mb-2 text-gray-800">Tambah Pengguna</h5>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow col-lg-6 mb-4">
            <div class="card-header">
                <div class="mb-3 col-7 d-flex align-items-center mb-md-1">
                    <router-link
                        to="/user"
                        class="btn icon icon-shape bg-red text-white rounded-circle"
                    >
                        <i
                            class="fa fa-arrow-circle-left"
                            aria-hidden="true"
                        ></i>
                    </router-link>
                    <h5 class="mb-0 mr-0 text-gray-900 px-2">Creat User</h5>
                </div>
            </div>
            <!-- Content -->
            <div class="card-body">
                <div class="responsive">
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form
                                    @submit.prevent="handleSubmit"
                                    method="post"
                                >
                                    <div class="form-group">
                                        <label for="id_role">User Role *</label>
                                        <select
                                            class="form-control"
                                            id="id_role"
                                            v-model="form.id_role"
                                            :class="{
                                                'is-invalid': error.id_role,
                                            }"
                                            :disabled="isDisabled"
                                        >
                                            <option>Petugas</option>
                                            <option>Pemimpin</option>
                                            <option>Guru</option>
                                            <option>Siswa</option>
                                        </select>
                                        <div
                                            class="invalid-feedback"
                                            v-for="(
                                                erorr, index
                                            ) in error.id_role"
                                            :key="index"
                                        >
                                            {{ erorr }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap *</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            v-model="form.name"
                                            :class="{
                                                'is-invalid': error.name,
                                            }"
                                            :disabled="isDisabled"
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
                                        <label for="email">Email *</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            v-model="form.email"
                                            :class="{
                                                'is-invalid': error.email,
                                            }"
                                            :disabled="isDisabled"
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
                                        <label for="password">Password *</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="password"
                                            v-model="form.password"
                                            :class="{
                                                'is-invalid': error.password,
                                            }"
                                            :disabled="isDisabled"
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
                                    <div class="form-group">
                                        <label for="kelamin"
                                            >Jenis Kelamin *</label
                                        >
                                        <select
                                            class="form-control"
                                            id="kelamin"
                                            v-model="form.jenis_kelamin"
                                            :class="{
                                                'is-invalid':
                                                    error.jenis_kelamin,
                                            }"
                                            :disabled="isDisabled"
                                        >
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                        <div
                                            class="invalid-feedback"
                                            v-for="(
                                                erorr, index
                                            ) in error.jenis_kelamin"
                                            :key="index"
                                        >
                                            {{ erorr }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Hp"
                                            >Nomor Telephone *</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="Hp"
                                            v-model="form.noHp"
                                            :class="{
                                                'is-invalid': noHp,
                                            }"
                                            :disabled="isDisabled"
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
                                        <label for="picture"
                                            >Profile Picture *</label
                                        >
                                        <input
                                            type="file"
                                            class="form-control"
                                            id="picture"
                                            @change="uploadPicture"
                                            :class="{
                                                'is-invalid': noHp,
                                            }"
                                            :disabled="isDisabled"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-for="(
                                                erorr, index
                                            ) in error.picture"
                                            :key="index"
                                        >
                                            {{ erorr }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat *</label>
                                        <textarea
                                            class="form-control"
                                            id="alamat"
                                            rows="3"
                                            v-model="form.alamat"
                                            :class="{
                                                'is-invalid': alamat,
                                            }"
                                            :disabled="isDisabled"
                                        ></textarea>
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

                                    <button
                                        type="submit"
                                        class="btn btn-primary text-center col-2 m-1"
                                        :disabled="isDisabled"
                                    >
                                        Save
                                    </button>
                                    <router-link
                                        :to="{ name: 'User' }"
                                        type="submit"
                                        class="btn btn-cancel text-center col-2"
                                        :class="{ disabled: isDisabled }"
                                    >
                                        Cancle
                                    </router-link>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Component -->
</template>

<style>
.card-header {
    background-color: white;
}

.card-judul {
    margin-bottom: 30px;
}
.btn-primary {
    background-color: #303137 !important;
    color: #fefefe;
    border-color: #303137;
}
.btn-primary:hover {
    background-color: #303137 !important;
    color: #fefefe;
    border-color: #303137;
}
.text-white {
    color: white !important;
    background-color: #303137;
}
.btn-cancel {
    background-color: #7a7a7a;
    color: white !important;
}
</style>
