<script>
import dayjs from "dayjs";
import "dayjs/locale/id";
import iziToast from "izitoast";
export default {
    data() {
        return {
            showForm: false,
            form: {
                jenis_surat_id: "",
                perihal: "",
                lampiranSurat: "",
                kepada: "",
                tanggalSurat: "",
                namaKegiatan: "",
                tanggalKegiatan: "",
                waktuMulaiKegiatan: "",
                waktuSelesaiKegiatan: "",
                tempatKegiatan: "",
                ctatanKegiatan: "",
                masalahKegiatan: "",
            },
            jenissurat: [],
            error: {},
            isDisabled: false,
            datacheck: {},
            test: [],
        };
    },
    mounted() {
        this.getData();
        this.dateNow();
        this.timeNow();
        this.getQr();
    },
    methods: {
        lihatSurat(event) {
            // cobaa;
            const selected = event.target.value;
            console.log(selected);

            // Cari jenis surat berdasarkan nilai selected
            const jenisSurat = this.jenissurat.find(
                (surat) => surat.id === selected
            );

            console.log(jenisSurat);

            // Atur nilai showForm berdasarkan hasil pencarian
            this.showForm = jenisSurat && jenisSurat.id === 2;
        },
        handleSubmit() {
            this.isDisabled = true;

            let formData = new FormData();

            formData.append("jenis_surat_id", this.datacheck.id);
            formData.append("perihal", this.form.perihal);

            formData.append("kepada", this.form.kepada);
            formData.append("tanggal_surat", this.form.tanggalSurat);
            formData.append("nama_kegiatan", this.form.namaKegiatan);
            formData.append("hari_kegiatan", this.form.hariKegiatan);
            formData.append("tanggal_kegiatan", this.form.tanggalKegiatan);
            formData.append(
                "waktu_mulai_kegiatan",
                this.form.waktuMulaiKegiatan
            );
            formData.append(
                "waktu_selesai_kegitan",
                this.form.waktuSelesaiKegiatan
            );
            formData.append("tempat_kegiatan", this.form.kepada);
            formData.append("catatan_kegiatan", this.form.ctatanKegiatan);
            formData.append("masalah_Kegiatan", this.form.masalahKegiatan);
            if (this.form.lampiranSurat) {
                formData.append("lampiran_surat", this.form.lampiranSurat);
            }
            //console.log(formData);
            this.$store
                .dispatch("postDataUpload", ["suratkeluar", formData])
                .then((result) => {
                    this.isDisabled = false;
                    iziToast.success({
                        title: "success",
                        message: "berhasil tambah data",
                        position: "topRight",
                        timeout: 1000,
                    });
                    setTimeout(() => {
                        this.$router.push({ name: "SuratKeluar" });
                    });
                    //console.log(result);
                })
                .catch((error) => {
                    this.isDisabled = false;
                    //console.log(error);
                    this.error = error.response.data.messages;
                });
        },
        getData() {
            this.$store
                .dispatch("getData", ["jenissurat", {}])
                .then((response) => {
                    this.jenissurat = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        chooseSurat(e) {
            this.$store
                .dispatch("showData", ["jenissurat", e.target.value])
                .then((response) => {
                    this.datacheck = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        uploadDokumen(e) {
            this.form.lampiranSurat = e.target.files[0];
            //console.log(this.form.dokumenSurat);
        },
        dateNow() {
            let ms = dayjs().locale("id");
            this.form.tanggalKegiatan = ms.format("YYYY-MM-DD");
            this.form.tanggalSurat = ms.format("YYYY-MM-DD");
        },
        timeNow() {
            let ms = dayjs().locale("id");
            this.form.waktuMulaiKegiatan = ms.format("HH:mm");
            this.form.waktuSelesaiKegiatan = ms.format("HH:mm");
        },
        convert(svgCode) {
            return `data:image/svg+xml;base64,${btoa(svgCode)}`;
        },
        getQr() {
            let type = "getData";
            let url = ["qrcode", {}];
            this.$store
                .dispatch(type, url)
                .then((result) => {
                    this.test = result;
                    console.log(result);
                })
                .catch((err) => {
                    console.log(err);
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
            <h5 class="h5 mb-2 text-gray-800">Tambah Surat Keluar</h5>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow col-lg-12 mb-4">
            <div class="card-header">
                <div class="mb-3 col-8 d-flex align-items-center mb-md-1">
                    <router-link
                        to="/suratkeluar"
                        class="btn icon icon-shape bg-red text-white rounded-circle"
                    >
                        <i
                            class="fa fa-arrow-circle-left"
                            aria-hidden="true"
                        ></i>
                    </router-link>
                    <h5 class="mb-0 mr-0 text-gray-900 px-3">
                        Tambah Data Surat Keluar
                    </h5>
                </div>
            </div>
            <!-- Content -->
            <div class="card-body">
                <div class="responsive">
                    <div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <!-- <div
                                    class="d-flex px-12 align-items-center margin-100px-bottom"
                                >
                                    <i
                                        class="fa fa-envelope"
                                        aria-hidden="true"
                                    ></i>
                                    <label for="" class="px-1 mb-0"
                                        >Pilih Surat</label
                                    >
                                </div> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <p>Pilih Jenis Surat :</p>
                                <form
                                    @submit.prevent="handleSubmit"
                                    method="post"
                                >
                                  <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="">Jenis Surat *</label>
                                            <select
                                                class="form-control"
                                                @change="chooseSurat($event)"
                                            >
                                                <option
                                                    v-for="(
                                                        surat, index
                                                    ) in jenissurat"
                                                    :key="index"
                                                    v-html="surat.name"
                                                    :value="surat.id"
                                                ></option>
                                            </select>
                                        </div>
                                        <div class="row col-12">
                                            <div class="col-md-0">
                                                <div class="col-sm-6 mb-3">
                                                    <div
                                                        class="d-flex px-12 align-items-center margin-100px-bottom"
                                                    >
                                                        <i
                                                            class="fa fa-folder"
                                                            aria-hidden="true"
                                                        ></i>
                                                        <label
                                                            for=""
                                                            class="px-1 mb-0"
                                                            >Data</label
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for=""
                                                >Penomoran Surat :</label
                                            >
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kode Surat *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                :value="datacheck.kodeSurat"
                                                :class="{
                                                    'is-invalid':
                                                        error.kodeSurat,
                                                }"
                                                disabled
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.kodeSurat"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Kode Sekolah *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                :value="datacheck.kodeSekolah"
                                                :class="{
                                                    'is-invalid':
                                                        error.kodeSekolah,
                                                }"
                                                disabled
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.KodeSekolah"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Tahun Ajaran*</label>
                                            <input
                                                type="text"
                                                class="form-control"

                                                :value="datacheck.tahunSurat"
                                                :class="{
                                                    'is-invalid':
                                                        error.tahunSurat,
                                                }"
                                                disabled
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.tahunSurat"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for=""
                                                >Data-Data Surat :</label
                                            >
                                        </div>
                                    </div>

                                    <div class="form-row" >
                                        <div class="form-group col-md-6">
                                            <label for=""
                                                >Ditujukan Kepada *</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="form.kepada"
                                                :class="{
                                                    'is-invalid': error.kepada,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Perihal *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="form.perihal"
                                                :class="{
                                                    'is-invalid': error.perihal,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=""
                                                >Tanggal Surat *</label
                                            >
                                            <input
                                                type="date"
                                                class="form-control"
                                                v-model="form.tanggalSurat"
                                                :class="{
                                                    'is-invalid':
                                                        error.tanggalSurat,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="file">Lampiran *</label>
                                            <input
                                                type="file"
                                                class="form-control"
                                                @change="uploadDokumen"
                                            />
                                        </div>
                                        <div class="row col-12">
                                            <div class="col-md-0">
                                                <div class="col-sm-6 mb-3">
                                                    <div
                                                        class="d-flex px-12 align-items-center margin-100px-bottom"
                                                    >
                                                        <i
                                                            class="fa fa-folder"
                                                            aria-hidden="true"
                                                        ></i>
                                                        <label
                                                            for=""
                                                            class="px-1 mb-0"
                                                            >Kegiatan</label
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label>Nama Kegiatan *</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    required
                                                    v-model="form.namaKegiatan"
                                                />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Tempat Kegiatan *</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    v-model="
                                                        form.tempatKegiatan
                                                    "
                                                />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Hari Kegiatan *</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    required
                                                    v-model="form.hariKegiatan"
                                                />
                                            </div>
                                            <div class="col-md-6 mb-6">
                                                <label
                                                    >Tanggal Kegiatan *</label
                                                >
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    required
                                                    v-model="
                                                        form.tanggalKegiatan
                                                    "
                                                />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label
                                                    >Waktu Kegiatan (Mulai)
                                                    *</label
                                                >
                                                <input
                                                    type="time"
                                                    class="form-control"
                                                    v-model="
                                                        form.waktuMulaiKegiatan
                                                    "
                                                />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label
                                                    >Waktu Kegiatan (Akhir)
                                                    *</label
                                                >
                                                <input
                                                    type="time"
                                                    class="form-control"
                                                    v-model="
                                                        form.waktuSelesaiKegiatan
                                                    "
                                                />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Catatan *</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    v-model="
                                                        form.ctatanKegiatan
                                                    "
                                                />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Masalah *</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    v-model="
                                                        form.masalahKegiatan
                                                    "
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row mt-3">
                                        <div class="col-sm-6 mb-3">
                                            <div
                                                class="d-flex px-12 align-items-center margin-100px-bottom"
                                            >
                                                <i
                                                    class="fa fa-folder"
                                                    aria-hidden="true"
                                                ></i>
                                                <label for="" class="px-1 mb-0"
                                                    >Pengaju Surat :</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Pengaju *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>Nip Pengaju *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>Jabatan Pengaju *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Pangkat Pengaju *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>gol Pengaju *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label
                                                >No Handphone Pengaju *</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-6 col-md-3 mt-3">
                                            <button
                                                type="submit"
                                                class="btn btn-primary text-center w-100 my-1"
                                                :disabled="isDisabled"
                                            >
                                                Simpan
                                            </button>
                                        </div>
                                        <div class="col-6 col-md-3 mt-3">
                                            <router-link
                                                :to="{ name: 'SuratKeluar' }"
                                                type="submit"
                                                class="btn btn-cancel text-center w-100 my-1"
                                                :class="{
                                                    disabled: isDisabled,
                                                }"
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
