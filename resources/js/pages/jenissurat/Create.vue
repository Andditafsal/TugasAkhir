<script>
export default {
    data() {
        return {
            form: {
                nama: "",
                nomorSurat: "",
            },
            error: {},
            isDisabled: false,
        };
    },
    methods: {
        handleSubmit() {
            this.isDisabled = true;

            let formData = new FormData();
            formData.append("nama", this.form.nama);
            formData.append("nomor_surat", this.form.nomorSurat);

            this.$store
                .dispatch("postDataUpload", ["jenissurat", formData])
                .then((result) => {
                    this.isDisabled = false;
                    this.$router.push({ name: "JenisSurat" });
                    //console.log(result);
                })
                .catch((error) => {
                    this.isDisabled = false;
                    //console.log(error);
                    this.error = error.response.data.messages;
                });
        },
    },
};
</script>
<template>
    <!-- Start Component -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-12 card-judul">
            <h5 class="h5 mb-2 text-gray-800">Tambah Jenis Surat</h5>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow col-lg-6 mb-4">
            <div class="card-header">
                <div class="mb-3 col-7 d-flex align-items-center mb-md-1">
                    <router-link
                        to="/jenissurat"
                        class="btn icon icon-shape bg-red text-white rounded-circle"
                    >
                        <i
                            class="fa fa-arrow-circle-left"
                            aria-hidden="true"
                        ></i>
                    </router-link>
                    <h5 class="mb-0 mr-0 text-gray-900 px-2">
                        Tambah Data Jenis-Jenis Surat
                    </h5>
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
                                        <label for="name">Nomor Surat *</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            v-model="form.nomorSurat"
                                            :class="{
                                                'is-invalid': error.nomorSurat,
                                            }"
                                            :disabled="isDisabled"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-for="(
                                                erorr, index
                                            ) in error.nomorSurat"
                                            :key="index"
                                        >
                                            {{ erorr }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Nama Surat *</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            v-model="form.nama"
                                            :class="{
                                                'is-invalid': error.nama,
                                            }"
                                            :disabled="isDisabled"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-for="(erorr, index) in error.nama"
                                            :key="index"
                                        >
                                            {{ erorr }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-md-2">
                                            <button
                                                type="submit"
                                                class="btn btn-primary text-center w-100 my-1"
                                                :disabled="isDisabled"
                                            >
                                                Save
                                            </button>
                                        </div>
                                        <div class="col-4 col-md-2">
                                            <router-link
                                                :to="{ name: 'JenisSurat' }"
                                                type="submit"
                                                class="btn btn-cancel text-center w-100 my-1"
                                                :class="{
                                                    disabled: isDisabled,
                                                }"
                                            >
                                                Cancle
                                            </router-link>
                                        </div>
                                    </div>
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
