<script>
import dayjs from "dayjs";
import "dayjs/locale/id";

export default {
    data() {
        return {
            form: {
                alamatSurat: "",
                nomorMasuk: "",
                perihalMasuk: "",
                tanggal: "",
                tanggalSurat: "",
                dokumenSurat: "",
                diajukan: "",
            },
            error: {},
            isDisabled: false,
        };
    },
    mounted() {
        this.dateNow();
    },
    methods: {
        handleSubmit() {
            this.isDisabled = true;
            let formData = new FormData();

            formData.append("alamat_surat", this.form.alamatSurat);
            formData.append("nomor_masuk", this.form.nomorMasuk);
            formData.append("perihal_masuk", this.form.perihalMasuk);
            formData.append("tanggal", this.form.tanggal);
            formData.append("tanggal_surat", this.form.tanggalSurat);
            formData.append("diajukan", this.form.diajukan);

            if (this.form.dokumenSurat) {
                formData.append("dokumen_surat", this.form.dokumenSurat);
            }
            //console.log(this.formData);
            //console.log(this.form);

            this.$store
                .dispatch("postDataUpload", ["suratmasuk", formData])
                .then((result) => {
                    this.isDisabled = false;
                    console.log(result);
                    this.$router.push({ name: "SuratMasuk" });
                    //console.log(result);
                })
                .catch((error) => {
                    this.isDisabled = false;
                    this.error = error.response.data.messages;
                });
        },
        uploadDokumen(e) {
            this.form.dokumenSurat = e.target.files[0];
            //console.log(this.form.dokumenSurat);
        },
        dateNow() {
            let ms = dayjs().locale("id");
            this.form.tanggal = ms.format("YYYY-MM-DD");
            this.form.tanggalSurat = ms.format("YYYY-MM-DD");
        },
    },
};
</script>
<template>
    <!-- Start Component -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-12 card-judul">
            <h5 class="h5 mb-2 text-gray-800">Tambah Surat Masuk</h5>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow col-lg-12 mb-4">
            <div class="card-header">
                <div class="mb-3 col-8 d-flex align-items-center mb-md-1">
                    <router-link
                        to="/suratmasuk"
                        class="btn icon icon-shape bg-red text-white rounded-circle"
                    >
                        <i
                            class="fa fa-arrow-circle-left"
                            aria-hidden="true"
                        ></i>
                    </router-link>
                    <h5 class="mb-0 mr-0 text-gray-900 px-3">
                        Tambah Data Surat Masuk
                    </h5>
                </div>
            </div>
            <!-- Content -->
            <div class="card-body">
                <div class="responsive">
                    <div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div
                                    class="d-flex px-12 align-items-center margin-100px-bottom"
                                >
                                    <i
                                        class="fa fa-folder"
                                        aria-hidden="true"
                                    ></i>
                                    <label for="" class="px-1 mb-0"
                                        >Data Surat Masuk</label
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <form
                                    @submit.prevent="handleSubmit"
                                    method="post"
                                >
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for=""
                                                >Tanggal Surat Masuk*</label
                                            >
                                            <input
                                                type="date"
                                                rows="3"
                                                class="form-control"
                                                id="tanggal"
                                                v-model="form.tanggal"
                                                :class="{
                                                    'is-invalid': error.tanggal,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.tanggal"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Asal Surat *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="nomorSurat"
                                                v-model="form.alamatSurat"
                                                :class="{
                                                    'is-invalid':
                                                        error.alamatSurat,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.asalSurat"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Nomor Surat *</label>
                                            <input
                                                type="string"
                                                class="form-control"
                                                id="nomorSurat"
                                                v-model="form.nomorMasuk"
                                                :class="{
                                                    'is-invalid':
                                                        error.nomorMasuk,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.nomorMasuk"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=""
                                                >Tanggal Surat *</label
                                            >
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="perihalMasuk"
                                                v-model="form.tanggalSurat"
                                                :class="{
                                                    'is-invalid':
                                                        error.tanggalSurat,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.tanggalSurat"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>
                                        <!-- <div class="form-group col-md-6">
                                            <label for="">Nama Surat *</label>
                                            <input
                                                type="text"s
                                                class="form-control"
                                                id="perihalMasuk"
                                                v-model="form.nama"
                                                :class="{
                                                    'is-invalid': error.nama,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.nama"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div> -->
                                        <div class="form-group col-md-6">
                                            <label for=""
                                                >Diajukan Kepada *</label
                                            >
                                            <select
                                                class="form-control"
                                                id="pengajuan"
                                                v-model="form.diajukan"
                                                :class="{
                                                    'is-invalid':
                                                        error.diajukan,
                                                }"
                                                :disabled="isDisabled"
                                            >
                                                <option>Kepala Sekolah</option>
                                            </select>
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.perihalMasuk"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Upload Surat *</label>
                                            <input
                                                type="file"
                                                class="form-control"
                                                id="upload dokumen"
                                                @change="uploadDokumen"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat"
                                            >Perihal Surat *</label
                                        >
                                        <textarea
                                            class="form-control"
                                            id="alamat"
                                            rows="3"
                                            v-model="form.perihalMasuk"
                                            :class="{
                                                'is-invalid': perihalMasuk,
                                            }"
                                            :disabled="isDisabled"
                                        ></textarea>
                                        <div
                                            class="invalid-feedback"
                                            v-for="(
                                                erorr, index
                                            ) in error.perihalMasuk"
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
                                                to="/suratmasuk"
                                                type="submit"
                                                class="btn btn-cancel text-center w-100 my-1"
                                                :class="{
                                                    disabled: isDisabled,
                                                }"
                                            >
                                                Cancel
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
