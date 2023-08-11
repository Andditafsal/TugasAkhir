<script>
import iziToast from "izitoast";
export default {
    props: ["id"],
    data() {
        return {
            form: {
                alamatSurat: "",
                nomorSurat: "",
                perihal: "",
                tanggal: "",
                tanggalSurat: "",
                dokumenSurat: "",
                keteranganSurat: "",
                diajukan: "",
            },
            error: {},
            isDisabled: false,
            showdokumenSurat: "",
            previewdokumenSurat: "",
        };
    },
    mounted() {
        this.getsuratMasuk();
    },
    methods: {
        setForm(suratmasuks) {
            this.form = {
                tanggal: suratmasuks.tanggal,
                alamatSurat: suratmasuks.alamatSurat,
                nomorSurat: suratmasuks.nomorSurat,
                perihal: suratmasuks.perihal,
                tanggalSurat: suratmasuks.tanggalSurat,
                keteranganSurat: suratmasuks.keteranganSurat,
                diajukan: suratmasuks.diajukan,
            };
            this.showdokumenSurat = suratmasuks.dokumen;
            this.previewdokumenSurat = suratmasuks.dokumen;
        },

        getsuratMasuk() {
            this.$store
                .dispatch("showData", ["suratmasuk", this.id])
                .then((response) => {
                    // this.setForm(response.data);
                    this.form = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        handleSubmit() {
            this.isDisabled = true;

            let formData = new FormData();
            formData.append("_method", "put");
            formData.append("alamat_surat", this.form.alamatSurat);
            formData.append("nomor_surat", this.form.nomorSurat);
            formData.append("perihal", this.form.perihalMasuk);
            formData.append("tanggal", this.form.tanggal);
            formData.append("tanggal_surat", this.form.tanggalSurat);
            formData.append("dokumen_surat", this.form.dokumenSurat);
            formData.append("keterangan_surat", this.form.keteranganSurat);
            formData.append("diajukan", this.form.diajukan);
            this.$store
                .dispatch("postDataUpload", ["suratmasuk/", +this.id, formData])
                .then((result) => {
                    this.isDisabled = false;
                    iziToast.success({
                        title: "success",
                        message: "Berhasil Edit Data",
                        position: "topRight",
                        timeout: 1000,
                    });
                    setTimeout(() => {
                        this.$router.push({ name: "SuratMasuk" });
                    }, 1000);
                })
                .catch((error) => {
                    this.isDisabled = false;
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
            <h5 class="h5 mb-2 text-gray-800">Edit Surat Masuk</h5>
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
                        Edit Surat Masuk
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
                                        >Data Surat</label
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
                                                v-model="form.nomorSurat"
                                                :class="{
                                                    'is-invalid':
                                                        error.nomorSurat,
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
                                        <div class="form-group col-md-6">
                                            <label for=""
                                                >Diajukan Kepada *</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="diajukan"
                                                v-model="form.diajukan"
                                                :class="{
                                                    'is-invalid':
                                                        error.diajukan,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.diajukan"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Perihal *</label>
                                            <input
                                                type=""
                                                class="form-control"
                                                id="perihalMasuk"
                                                v-model="form.perihal"
                                                :class="{
                                                    'is-invalid': error.perihal,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.perihal"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=""
                                                >Keternagan Surat *</label
                                            >
                                            <input
                                                type=""
                                                class="form-control"
                                                id="Keterangan Surat"
                                                v-model="form.keteranganSurat"
                                                :class="{
                                                    'is-invalid':
                                                        error.keteranganSurat,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.keteranganSurat"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=""
                                                >Upload Surat Jika Perlu*</label
                                            >
                                            <span class="px-2">
                                                <a
                                                    :href="form.dokumen"
                                                    class="btn btn-sm btn-danger"
                                                    target="_blank"
                                                >
                                                    lihat surat
                                                </a></span
                                            >

                                            <input
                                                type="file"
                                                class="form-control"
                                                id="upload dokumen"
                                                @change="uploadDokumen"
                                                :class="{
                                                    'is-invalid': dokumenSurat,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-3">
                                            <button
                                                type="submit"
                                                class="btn btn-primary text-center w-100 my-1"
                                                :disabled="isDisabled"
                                                style="display: block"
                                            >
                                                Simpan
                                            </button>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <router-link
                                                :to="{ name: 'SuratMasuk' }"
                                                type="submit"
                                                class="btn btn-cancel text-center w-100 my-1"
                                                :class="{
                                                    disabled: isDisabled,
                                                }"
                                                style="display: block"
                                            >
                                                Batal
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
.btn-cancel:hover {
    background-color: #7a7a7a;
    color: white !important;
}
</style>
