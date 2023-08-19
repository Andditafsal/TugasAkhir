<script>
import SignaturePad from "./SignaturePad.vue";
import Cookies from "js-cookie";
export default {
    props: ["id"],
    data() {
        return {
            suratkeluar: {},
            jenissurat: [],
            suratId: 1,
            showingSignaturePad: false,
            datacheck: {},
        };
    },
    components: {
        SignaturePad,
    },
    computed: {
        getUsers() {
            const user = Cookies.get('user');
            const parse = JSON.parse(user);
            const roleId = parse.data.role.id; 
            console.log(roleId);
            return roleId; 
        },
    },
    mounted() {
        this.getSuratKeluar();
    },
    methods: {
        showSignaturePad() {
            this.showingSignaturePad = true;
        },
        saveSignature(dataURL) {
            this.$store
                .dispatch("postData", [
                    `/signature/${this.$route.params.id}`,
                    {
                        signature: dataURL,
                    },
                ])
                .then((response) => {
                    this.showingSignaturePad = false;
                    console.log("ok");
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        cancelSignature() {
            this.showingSignaturePad = false;
        },
        getSuratKeluar() {
            let type = "postData";
            let url = null;
            if (this.getUsers === 2) {
                url = [`suratkeluar/${this.$route.params.id}`, {}];
            } else {
                url = [`suratkeluar/update_pemimpin/${this.$route.params.id}`, {}];
            }
            this.$store.dispatch(type, url)
                .then((result) => {
                    this.suratkeluar = result.data;
                })
                .catch((err) => {
                    console.log(err);
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
        setForm(suratkeluars) {
            this.form = {
                jenisSuratId: suratkeluars.jenisSuratId,
                name: suratkeluars.jenisSurat?.name,
                kodeSurat: suratkeluars.jenisSurat?.kodeSurat,
                kodeSekolah: suratkeluars.jenisSurat?.kodeSekolah,
                tahunSurat: suratkeluars.jenisSurat?.tahunSurat,
            };
            this.suratId = suratkeluars.jenisSuratId;
        },
        onClick(id) {
            this.$store
                .dispatch("postData", ["suratkeluar/" + id, {}])
                .then((response) => {
                    console.log("response");
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        clikOn(id) {
            this.$store
                .dispatch("postData", ["suratkeluar/" + id, {}])
                .then((response) => {
                    console.log("response");
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        updateStatus(id) {
            let type = "postData";
            let url = [`suratkeluar/update/${id}`, {}];
            this.$store.dispatch(type, url).then((result) => {
                this.$router.push({ name: "SuratKeluar" });
            });
        },
    },
};
</script>
<template>
    {{ suratkeluar }}
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow col-lg-12 mb-4">
            <div class="card-header">
                <div class="mb-3 col-12 d-flex justify-content-between align-items-center mb-md-0">
                    <h5 class="mb-0 text-gray-900 mb-2">Detail Surat Keluar</h5>
                    <button type="submit" class="btn btn-sm btn-primary" @click="updateStatus(suratkeluar.id)">
                        tindak lanjuti
                    </button>
                    <!-- <div
                        class="dropdown show"
                        v-if="$can('action', 'Pemimpin')"
                    >
                        <a
                            class="btn btn-secondary dropdown-toggle"
                            href="#"
                            role="button"
                            id="dropdownMenuLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            Tanda Tangan
                        </a>

                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuLink"
                        >
                            <a
                                class="dropdown-item"
                                href="https://oauth.privy.id/login"
                                >Privy</a
                            >
                            <a class="dropdown-item" href="#">qrCode</a>
                            <a class="dropdown-item" href="#">ttd pen</a>
                            <a
                                class="dropdown-item"
                                href="#"
                                @click="showSignaturePad"
                                >Tanda Tangan Digital</a
                            >
                        </div>
                    </div> -->
                    <div class="dropdown" v-if="$can('action', 'Pemimpin')">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            @click="clikOn">
                            Tanda Tangan
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <!-- <a
                                class="dropdown-item"
                                href="https://oauth.privy.id/login"
                                >Privy</a
                            > -->

                            <a class="dropdown-item" href="#" @click="showSignaturePad">Tanda Tangan Digital</a>
                        </div>
                    </div>
                    <div v-if="showingSignaturePad">
                        <signature-pad @save="saveSignature(suratkeluar.id)" @cancel="cancelSignature" />
                    </div>
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

                                            <input type="text" class="form-control" @change="chooseSurat($event)" :value="suratkeluar.jenisSurat?.name
                                                " disabled />
                                        </div>
                                        <div class="row col-12">
                                            <div class="col-md-0">
                                                <div class="col-sm-6 mb-3">
                                                    <div class="d-flex px-12 align-items-center margin-100px-bottom">
                                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                                        <label for="" class="px-1 mb-0">Data</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Penomoran Surat :</label>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Kode Surat *</label>
                                            <input type="text" class="form-control" disabled :value="suratkeluar.jenisSurat
                                                ?.kodeSurat
                                                " />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Nomor Surat *</label>
                                            <input type="text" class="form-control" disabled
                                                v-model="suratkeluar.noSurat" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Kode Sekolah *</label>
                                            <input type="text" class="form-control" disabled :value="suratkeluar.jenisSurat
                                                ?.kodeSekolah
                                                " />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Tahun Surat*</label>
                                            <input type="text" class="form-control" disabled :value="suratkeluar.jenisSurat
                                                ?.tahunSurat
                                                " />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Data-Data Surat :</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Ditujukan Kepada *</label>
                                            <input type="text" class="form-control" v-model="suratkeluar.kepada" disabled />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Perihal *</label>
                                            <input type="text" class="form-control" v-model="suratkeluar.perihal"
                                                disabled />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Tanggal Surat *</label>
                                            <input type="text" class="form-control" v-model="suratkeluar.tanggalSurat
                                                " disabled />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="file">Lampiran *</label>
                                            <input type="file" class="form-control" @change="uploadDokumen" disabled />
                                        </div>

                                        <div class="col-md-6 mb-3" v-show="suratId == 2">
                                            <label>Nama Orang Tua Siswa atau Wali
                                                *</label>
                                            <input v-model="suratkeluar.waliMurid" disabled type="text"
                                                class="form-control" />
                                        </div>
                                        <div class="col-md-6 mb-3" v-show="suratId == 4">
                                            <label>Nama Lengkap Pegawai *</label>
                                            <input type="text" class="form-control" required v-model="suratkeluar.namaPegawai
                                                " disabled />
                                        </div>
                                        <div class="col-md-6 mb-3" v-show="suratId == 4">
                                            <label>Nip Pegawai *</label>
                                            <input v-model="suratkeluar.nip" disabled type="text" class="form-control" />
                                        </div>
                                        <div class="col-md-6 mb-3" v-show="suratId == 4">
                                            <label>Jabatan Pegawai *</label>
                                            <input v-model="suratkeluar.jabatan" disabled type="text" class="form-control"
                                                required />
                                        </div>
                                        <div class="col-md-6 mb-3" v-show="suratId == 2">
                                            <label>Kelas *</label>
                                            <input v-model="suratkeluar.kelasSiswa" disabled type="text"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group col-md-12" v-show="suratId == 1">
                                            <label for="">Tahun Ajaran *</label>
                                            <input placeholder="Gunakan format penulisan 2023/2024" v-model="suratkeluar.tahunAjaran
                                                " disabled type="text" class="form-control" />
                                        </div>
                                        <div class="row col-12" v-show="suratId == 3">
                                            <div class="col-md-0">
                                                <div class="col-sm-6 mb-3">
                                                    <div class="d-flex px-12 align-items-center margin-100px-bottom">
                                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                                        <label for="" class="px-1 mb-0">Menugaskan,kepada:</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3" v-show="suratId == 3">
                                                <label>Nama *</label>
                                                <input v-model="suratkeluar.kepada" type="text" class="form-control" />
                                            </div>
                                            <div class="col-md-6 mb-3" v-show="suratId == 3">
                                                <label>Nip*</label>
                                                <input v-model="suratkeluar.nip" disabled type="text"
                                                    class="form-control" />
                                            </div>
                                            <div class="col-md-6 mb-3" v-show="suratId == 3">
                                                <label>Pangkat *</label>
                                                <input v-model="suratkeluar.pangkat
                                                    " type="text" class="form-control" required />
                                            </div>
                                            <div class="col-md-6 mb-6" v-show="suratId == 3">
                                                <label>Golongan *</label>
                                                <input v-model="suratkeluar.gol" disabled type="text" class="form-control"
                                                    required />
                                            </div>
                                            <div class="col-md-6 mb-3" v-show="suratId == 3">
                                                <label>Jabatan *</label>
                                                <input v-model="suratkeluar.jabatan
                                                    " disabled type="text" class="form-control" required />
                                            </div>
                                            <div class="col-md-6 mb-3" v-show="suratId == 3">
                                                <label>Jurusan *</label>
                                                <input v-model="suratkeluar.jurusanSiswa
                                                    " disabled type="text" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="row col-12" v-show="suratId == 3">
                                            <div class="col-md-0">
                                                <div class="col-sm-6 mb-3">
                                                    <div class="d-flex px-12 align-items-center margin-100px-bottom">
                                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                                        <label for="" class="px-1 mb-0">Ditugaskan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3" v-show="suratId == 3">
                                            <label>Nama Industri *</label>
                                            <input v-model="suratkeluar.namaIndustri
                                                " type="text" class="form-control" disabled />
                                        </div>
                                        <div class="col-md-6 mb-3" v-show="suratId == 3">
                                            <label>Alamat Industri *</label>
                                            <input v-model="suratkeluar.alamatIndustri
                                                " type="text" class="form-control" disabled />
                                        </div>
                                        <div class="row col-12">
                                            <div class="col-md-0">
                                                <div class="col-sm-6 mb-3">
                                                    <div class="d-flex px-12 align-items-center margin-100px-bottom">
                                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                                        <label for="" class="px-1 mb-0">Kegiatan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label>Nama Kegiatan *</label>
                                                <input type="text" class="form-control" required v-model="suratkeluar.namaKegiatan
                                                    " disabled />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Tempat Kegiatan *</label>
                                                <input type="text" class="form-control" disabled v-model="suratkeluar.tempatKegiatan
                                                    " />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Hari Kegiatan *</label>
                                                <input type="text" class="form-control" disabled v-model="suratkeluar.hariKegiatan
                                                    " />
                                            </div>
                                            <div class="col-md-6 mb-6">
                                                <label>Tanggal Kegiatan *</label>
                                                <input type="date" class="form-control" disabled v-model="suratkeluar.tanggalKegiatan
                                                    " />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Waktu Kegiatan (Mulai)
                                                    *</label>
                                                <input type="time" class="form-control" v-model="suratkeluar.waktuMulaiKegiatan
                                                    " disabled />
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
                                            <div class="col-md-6 mb-3" v-show="suratId == 2">
                                                <label>Masalah *</label>
                                                <input class="form-control" type="text" v-model="suratkeluar.masalahKegiatan
                                                    " disabled />
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
                                            <div class="d-flex px-12 align-items-center margin-100px-bottom">
                                                <i class="fa fa-folder" aria-hidden="true"></i>
                                                <label for="" class="px-1 mb-0">Pemohon Pengajuan Surat
                                                    :</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Lengkap *</label>
                                            <input type="text" class="form-control" disabled v-model="suratkeluar.namaPengaju
                                                " />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>Nip *</label>
                                            <input type="text" class="form-control" disabled
                                                v-model="suratkeluar.nipPengaju" />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>Jabatan *</label>
                                            <input type="text" class="form-control" disabled v-model="suratkeluar.jabatanPengaju
                                                " />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>No Hp *</label>
                                            <input type="text" class="form-control" disabled v-model="suratkeluar.kontakPengaju
                                                " />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-2 mt-3">
                                            <router-link :to="{ name: 'SuratKeluar' }" type="submit"
                                                class="btn btn-cancel text-center w-100 my-1" :class="{
                                                    disabled: isDisabled,
                                                }">
                                                Kembali
                                            </router-link>
                                        </div>
                                        <div class="col-6 col-md-2 mt-3">
                                            <router-link :to="{
                                                name: 'Edit Surat Keluar',
                                            }" type="submit" class="btn btn-primary text-center w-100 my-1"
                                                :disabled="isDisabled" v-if="$can('action', 'Petugas')">
                                                Edit
                                            </router-link>
                                        </div>
                                        <div class="col-6 col-md-2 mt-3">
                                            <a :href="'/cetak/' + id" class="btn btn-cetak text-center w-100 my-1"
                                                v-if="$can('action', 'Petugas')">
                                                Cetak
                                            </a>
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

.btn-cetak {
    background-color: #3d8353;
    color: white !important;
}

.btn-cetak:hover {
    background-color: #3d8353;
    color: white !important;
}

.btn-tindaklanjut {
    background-color: #b0ac3f;
    color: white !important;
}

.btn-tindaklanjut:hover {
    background-color: #b0ac3f;
    color: white !important;
}
</style>
