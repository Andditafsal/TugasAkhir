<script>
import iziToast from "izitoast";
export default {
    props: ["id"],
    data() {
        return {
            form: {
                jenis_surat_id: "",
                perihal: "",
                lampiranSurat: "",
                kepada: "",
                tanggalSurat: "",
                namaKegiatan: "",
                hariKegiatan: "",
                tanggalKegiatan: "",
                waktuMulaiKegiatan: "",
                waktuSelesaiKegiatan: "",
                tempatKegiatan: "",
                catatanKegiatan: "",
                masalahKegiatan: "",
                namaIndustri: "",
                alamatIndustri: "",
                kelasSiswa: "",
                jurusanSiswa: "",
                tahunAjaran: "",
                nip: "",
                pangkat: "",
                jabatan: "",
                gol: "",
                namaOrtu: "",
                namaPegawai: "",
                waliMurid: "",
                namaPengaju: "",
                nipPengaju: "",
                jabatanPengaju: "",
                kontakPengaju: "",
                noSurat: "",
            },
            error: {},
            isDisabled: false,
            jenissurat: [],
            datacheck: {},
            suratId: 1,
            showdokumenSurat: "",
            previewdokumenSurat: "",
        };
    },
    created() {
        this.getSuratKeluar();
    },
    methods: {
        setForm(suratkeluars) {
            this.form = {
                jenisSuratId: suratkeluars.jenisSuratId,

                name: suratkeluars.jenisSurat?.name,
                kodeSurat: suratkeluars.jenisSurat?.kodeSurat,
                kodeSekolah: suratkeluars.jenisSurat?.kodeSekolah,
                tahunSurat: suratkeluars.jenisSurat?.tahunSurat,
                noSurat: suratkeluars.noSurat,
                perihal: suratkeluars.perihal,

                kepada: suratkeluars.kepada,
                tanggalSurat: suratkeluars.tanggalSurat,
                namaKegiatan: suratkeluars.namaKegiatan,
                hariKegiatan: suratkeluars.hariKegiatan,
                tanggalKegiatan: suratkeluars.tanggalKegiatan,
                waktuMulaiKegiatan: suratkeluars.waktuMulaiKegiatan,
                waktuSelesaikegiatan: suratkeluars.waktuSelesaiKegiatan,
                tempatKegiatan: suratkeluars.tempatKegiatan,
                catatanKegiatan: suratkeluars.catatanKegiatan,
                masalahKegiatan: suratkeluars.masalahKegiatan,
                namaIndustri: suratkeluars.namaIndustri,
                alamatIndustri: suratkeluars.alamatIndustri,
                jurusanSiswa: suratkeluars.jurusanSiswa,
                tahunAjaran: suratkeluars.tahunAjaran,
                nip: suratkeluars.nip,
                pangkat: suratkeluars.pangkat,
                jabatan: suratkeluars.jabatan,
                gol: suratkeluars.gol,
                namaOrtu: suratkeluars.namaOrtu,
                kelasSiswa: suratkeluars.kelasSiswa,

                namaPegawai: suratkeluars.namaPegawai,
                waliMurid: suratkeluars.waliMurid,
                namaPengaju: suratkeluars.namaPengaju,
                nipPengaju: suratkeluars.nipPengaju,
                jabatanPengaju: suratkeluars.jabatanPengaju,
                kontakPengaju: suratkeluars.kontakPengaju,
            };
            this.suratId = suratkeluars.jenisSuratId;
            this.showdokumenSurat = suratkeluars.lampiran;
            this.previewdokumenSurat = suratkeluars.lampiran;
        },
        getSuratKeluar() {
            this.$store
                .dispatch("showData", ["suratkeluar", this.id])
                .then((response) => {
                    console.log(response);
                    this.setForm(response.data);
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
        handleSubmit() {
            this.isDisabled = true;
            let formData = new FormData();
            formData.append("_method", "put");
            formData.append("jenis_surat_id", this.form.jenisSuratId);
            formData.append("no_surat", this.form.noSurat);
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
            formData.append("tempat_kegiatan", this.form.tempatKegiatan);
            formData.append("catatan_kegiatan", this.form.catatanKegiatan);
            formData.append("masalah_Kegiatan", this.form.masalahKegiatan);
            formData.append("nama_industri", this.form.namaIndustri);
            formData.append("alamat_industri", this.form.alamatIndustri);
            formData.append("jurusan_siswa", this.form.jurusanSiswa);
            formData.append("tahun_ajaran", this.form.tahunAjaran);
            formData.append("nip", this.form.nip);
            formData.append("pangkat", this.form.pangkat);
            formData.append("jabatan", this.form.jabatan);
            formData.append("gol", this.form.gol);
            // formData.append("nama_ortu", this.form.namaOrtu);
            formData.append("nama_pegawai", this.form.namaPegawai);
            formData.append("wali_murid", this.form.waliMurid);
            formData.append("nama_pengaju", this.form.namaPengaju);
            formData.append("nip_pengaju", this.form.nipPengaju);
            formData.append("jabatan_pengaju", this.form.jabatanPengaju);
            formData.append("kontak_pengaju", this.form.kontakPengaju);
            if (this.form.lampiranSurat) {
                formData.append("lampiran_surat", this.form.lampiran);
            }
            this.isSuccess = true;
            this.$store
                .dispatch("postDataUpload", [
                    "suratkeluar/" + this.id,
                    formData,
                ])
                .then((result) => {
                    this.isDisabled = false;
                    iziToast.success({
                        title: "success",
                        message: "Berhasil Edit Data",
                        position: "topRight",
                        timeout: 1000,
                    });
                    setTimeout(() => {
                        this.$router.push({ name: "SuratKeluar" });
                    }, 1000);
                })
                .catch((error) => {
                    this.isDisabled = false;
                    this.error = error.response.data.messages;
                    //  console.log(error);
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
    },
};
</script>

<template>
    <!-- Start Component -->
    <div class="container-fluid">
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
                        Edit Data Surat Keluar
                    </h5>
                </div>
            </div>
            <!-- Content -->
            <div class="card-body">
                <div class="responsive">
                    <div>
                        <div class="row">
                            <div class="col-sm-6 mb-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <p>Pilih Jenis Surat :</p>
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="">Jenis Surat *</label>

                                            <input
                                                type="text"
                                                class="form-control"
                                                @change="chooseSurat($event)"
                                                id="jenis surat"
                                                :value="form.jenisSuratId"
                                                hidden
                                                disabled
                                            />

                                            <input
                                                type="text"
                                                class="form-control"
                                                @change="chooseSurat($event)"
                                                id="jenis surat"
                                                :value="form.name"
                                                disabled
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

                                        <div class="form-group col-md-3">
                                            <label for="">Kode Surat *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                :value="form.kodeSurat"
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
                                        <div class="form-group col-md-3">
                                            <label for="">Nomor Surat*</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="form.noSurat"
                                                :class="{
                                                    'is-invalid': error.noSurat,
                                                }"
                                                placeholder="Diisi oleh petugas TU"
                                            />
                                            <div
                                                class="invalid-feedback"
                                                v-for="(
                                                    erorr, index
                                                ) in error.noSurat"
                                                :key="index"
                                            >
                                                {{ erorr }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Kode Sekolah *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                :value="form.kodeSekolah"
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
                                        <div class="form-group col-md-3">
                                            <label for="">Tahun Surat*</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                :value="form.tahunSurat"
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
                                    <div class="form-row">
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
                                            <span class="px-2">
                                                <a
                                                    :href="form.lampiran"
                                                    class="btn btn-sm btn-danger"
                                                    target="_blank"
                                                >
                                                    lihat surat
                                                </a></span
                                            >

                                            <input
                                                type="file"
                                                class="form-control"
                                                @change="uploadDokumen"
                                            />
                                        </div>

                                        <div
                                            class="col-md-6 mb-3"
                                            v-show="suratId == 2"
                                        >
                                            <!-- <label
                                                >Nama Orang Tua Siswa atau Wali
                                                *</label
                                            >
                                            <input
                                                v-model="form.namaOrtu"
                                                :class="{
                                                    'is-invalid':
                                                        error.namaOrtu,
                                                }"
                                                :disabled="isDisabled"
                                                type="text"
                                                class="form-control"
                                                required
                                            /> -->
                                        </div>
                                        <div
                                            class="col-md-6 mb-3"
                                            v-show="suratId == 4"
                                        >
                                            <label
                                                >Nama Lengkap Pegawai *</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                                v-model="form.namaPegawai"
                                                :class="{
                                                    'is-invalid':
                                                        error.namaPegawai,
                                                }"
                                                :disabled="isDisabled"
                                            />
                                        </div>
                                        <div
                                            class="col-md-6 mb-3"
                                            v-show="suratId == 4"
                                        >
                                            <label>Nip Pegawai *</label>
                                            <input
                                                v-model="form.nip"
                                                :class="{
                                                    'is-invalid': error.nip,
                                                }"
                                                :disabled="isDisabled"
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div
                                            class="col-md-6 mb-3"
                                            v-show="suratId == 4"
                                        >
                                            <label>Jabatan Pegawai *</label>
                                            <input
                                                v-model="form.jabatan"
                                                :class="{
                                                    'is-invalid': error.jabatan,
                                                }"
                                                :disabled="isDisabled"
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div
                                            class="col-md-6 mb-3"
                                            v-show="suratId == 2"
                                        >
                                            <label>Kelas *</label>
                                            <input
                                                v-model="form.kelasSiswa"
                                                :class="{
                                                    'is-invalid':
                                                        error.kelasSiswa,
                                                }"
                                                :disabled="isDisabled"
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div
                                            class="form-group col-md-12"
                                            v-show="suratId == 1"
                                        >
                                            <label for="">Tahun Ajaran *</label>
                                            <input
                                                placeholder="Gunakan format penulisan 2023/2024"
                                                v-model="form.tahunAjaran"
                                                :class="{
                                                    'is-invalid':
                                                        error.tahunAjaran,
                                                }"
                                                :disabled="isDisabled"
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div
                                            class="row col-12"
                                            v-show="suratId == 3"
                                        >
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
                                                            >Menugaskan,kepada:</label
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div
                                                class="col-md-6 mb-3"
                                                v-show="suratId == 3"
                                            >
                                                <label>Nama *</label>
                                                <input
                                                    v-model="form.kepada"
                                                    :class="{
                                                        'is-invalid':
                                                            error.kepada,
                                                    }"
                                                    :disabled="isDisabled"
                                                    type="text"
                                                    class="form-control"
                                                    required
                                                />
                                            </div>
                                            <div
                                                class="col-md-6 mb-3"
                                                v-show="suratId == 3"
                                            >
                                                <label>Nip*</label>
                                                <input
                                                    v-model="form.nip"
                                                    :class="{
                                                        'is-invalid': error.nip,
                                                    }"
                                                    :disabled="isDisabled"
                                                    type="text"
                                                    class="form-control"
                                                    required
                                                />
                                            </div>
                                            <div
                                                class="col-md-6 mb-3"
                                                v-show="suratId == 3"
                                            >
                                                <label>Pangkat *</label>
                                                <input
                                                    v-model="form.pangkat"
                                                    :class="{
                                                        'is-invalid':
                                                            error.kepada,
                                                    }"
                                                    :disabled="isDisabled"
                                                    type="text"
                                                    class="form-control"
                                                    required
                                                />
                                            </div>
                                            <div
                                                class="col-md-6 mb-6"
                                                v-show="suratId == 3"
                                            >
                                                <label>Golongan *</label>
                                                <input
                                                    v-model="form.gol"
                                                    :class="{
                                                        'is-invalid': error.gol,
                                                    }"
                                                    :disabled="isDisabled"
                                                    type="text"
                                                    class="form-control"
                                                    required
                                                />
                                            </div>
                                            <div
                                                class="col-md-6 mb-3"
                                                v-show="suratId == 3"
                                            >
                                                <label>Jabatan *</label>
                                                <input
                                                    v-model="form.jabatan"
                                                    :class="{
                                                        'is-invalid':
                                                            error.jabatan,
                                                    }"
                                                    :disabled="isDisabled"
                                                    type="text"
                                                    class="form-control"
                                                    required
                                                />
                                            </div>
                                            <div
                                                class="col-md-6 mb-3"
                                                v-show="suratId == 3"
                                            >
                                                <label>Jurusan *</label>
                                                <input
                                                    v-model="form.jurusanSiswa"
                                                    :class="{
                                                        'is-invalid':
                                                            error.jurusanSiswa,
                                                    }"
                                                    :disabled="isDisabled"
                                                    type="text"
                                                    class="form-control"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div
                                            class="row col-12"
                                            v-show="suratId == 3"
                                        >
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
                                                            >Ditugaskan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-6 mb-3"
                                            v-show="suratId == 3"
                                        >
                                            <label>Nama Industri *</label>
                                            <input
                                                v-model="form.namaIndustri"
                                                :class="{
                                                    'is-invalid':
                                                        error.namaIndustri,
                                                }"
                                                :disabled="isDisabled"
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div
                                            class="col-md-6 mb-3"
                                            v-show="suratId == 3"
                                        >
                                            <label>Alamat Industri *</label>
                                            <input
                                                v-model="form.alamatIndustri"
                                                :class="{
                                                    'is-invalid':
                                                        error.alamatIndustri,
                                                }"
                                                :disabled="isDisabled"
                                                type="text"
                                                class="form-control"
                                                required
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
                                                    type="text"
                                                    class="form-control"
                                                    v-model="
                                                        form.waktuMulaiKegiatan
                                                    "
                                                    :class="{
                                                        'is-invalid':
                                                            error.waktuMulaiKegiatan,
                                                    }"
                                                />
                                            </div>
                                            <!-- <div
                                                class="col-md-6 mb-3"
                                                v-show="suratId == 2"
                                            >
                                                <label>Masalah *</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    v-model="
                                                        form.masalahKegiatan
                                                    "
                                                />
                                            </div> -->
                                            <div
                                                class="col-md-6 mb-3"
                                                v-show="suratId == 2"
                                            >
                                                <label>Masalah *</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    v-model="
                                                        form.masalahKegiatan
                                                    "
                                                />
                                            </div>
                                            <!-- <div
                                                class="col-md-6 mb-3"
                                                v-show="suratId == 2"
                                            >
                                                <label>Catatan *</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    v-model="
                                                        form.ctatanKegiatan
                                                    "
                                                />
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-6 mb-3">
                                            <div
                                                class="d-flex px-12 align-items-center margin-100px-bottom"
                                            >
                                                <i
                                                    class="fa fa-folder"
                                                    aria-hidden="true"
                                                ></i>
                                                <label for="" class="px-1 mb-0"
                                                    >Pemohon Pengajuan Surat
                                                    :</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Lengkap *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                                v-model="form.namaPengaju"
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>Nip *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                                v-model="form.nipPengaju"
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>Jabatan *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                                v-model="form.jabatanPengaju"
                                            />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>No Hp *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                                v-model="form.kontakPengaju"
                                            />
                                        </div>
                                    </div>
                                    <!-- <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Lengkap *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>Nip *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>Jabatan *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>No Hp *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-6 col-md-2 mt-3">
                                            <button
                                                type="submit"
                                                class="btn btn-primary text-center w-100 my-1"
                                                :disabled="isDisabled"
                                                @click="handleSubmit"
                                            >
                                                Simpan
                                            </button>
                                        </div>
                                        <div class="col-6 col-md-2 mt-3">
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
