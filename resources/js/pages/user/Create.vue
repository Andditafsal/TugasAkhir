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
        };
    },
    methods: {
        handleSubmit() {
            let formData = new FormData();
            formData.append("name", this.form.name);
            formData.append("name", this.form.email);
            formData.append("name", this.form.id_role);
            formData.append("name", this.form.jenis_kelamin);
            formData.append("name", this.form.alamat);
            formData.append("name", this.form.noHp);
            formData.append("name", this.form.password);
            formData.append("name", this.form.picture);

            this.$store
                .dispatch("postDataUpload", ["user", formData])
                .then((result) => {
                    //this.$router.push("/auth/login");
                    console.log(result);
                })
                .catch((error) => {
                    // this.error = error.response.data.messages;
                    console.log(error);
                });
        },
        uploadPicture() {
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
            <h5 class="h5 mb-2 text-gray-800">Tamba Pengguna</h5>
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
                                        <label for="role">User Role *</label>
                                        <select
                                            class="form-control"
                                            id="role"
                                            v-model="form.id_role"
                                        >
                                            <option>Petugas</option>
                                            <option>Pemimpin</option>
                                            <option>Guru</option>
                                            <option>Siswa</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap *</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            v-model="form.name"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            v-model="form.email"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="password"
                                            v-model="form.password"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="kelamin"
                                            >Jenis Kelamin *</label
                                        >
                                        <select
                                            class="form-control"
                                            id="kelamin"
                                            v-model="form.jenis_kelamin"
                                        >
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="noHp"
                                            >Nomor Telephone *</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="noHp"
                                            v-model="form.noHp"
                                        />
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
                                        />
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat *</label>
                                        <textarea
                                            class="form-control"
                                            id="alamat"
                                            rows="3"
                                            v-model="form.alamat"
                                        ></textarea>
                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-primary text-center col-2 m-1"
                                    >
                                        Save
                                    </button>
                                    <button
                                        type="submit"
                                        class="btn btn-cancel text-center col-2"
                                    >
                                        Cancle
                                    </button>
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
