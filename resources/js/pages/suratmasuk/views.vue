<script>
export default {
    props: ["id"],
    data() {
        return {
            form: {
                user_id: "",
                catatan: "",
            },
            suratmasuk: {},
            users: {},
        };
    },
    mounted() {
        this.getSuratMasuk();
        this.getUser();
    },
    methods: {
        getUser() {
            this.$store
                .dispatch("getData", ["user", ""])
                .then((response) => {
                    this.users = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getSuratMasuk() {
            this.$store
                .dispatch("showData", ["suratmasuk", this.id])
                .then((response) => {
                    this.suratmasuk = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        handleDisposisi() {
            this.$store
                .dispatch("postData", [
                    "/suratmasuk/" + this.id + "/disposisi",
                    this.form,
                ])
                .then((result) => {
                    //this.isDisabled = false;
                    //console.log("ada");
                    //console.log(result);
                    $("#disposisiModal").modal("hide");
                    this.$router.push({ name: "SuratMasuk" });
                    //console.log(result);
                })
                .catch((error) => {
                    console.log(error);
                    //this.isDisabled = false;
                    this.error = error.response.data.messages;
                });
        },
    },
};
</script>
<template>
    <div class="card-headercoba">
        <div class="mb-3 col-12 col-md-8 d-flex align-items-center mb-md-1">
            <router-link
                to="/suratmasuk"
                class="btn icon icon-shape bg-red text-white rounded-circle"
            >
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
            </router-link>
            <h5 class="mb-0 mr-0 text-gray-900 px-3">Surat Masuk</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="embed-responsive embed-responsive-1by1">
                        <iframe
                            :src="suratmasuk.dokumen"
                            class="embed-responsive-item"
                            frameborder="0"
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div
                        class="mb-3 col-12 d-flex justify-content-between align-items-center mb-md-0"
                    >
                        <h5 class="mb-0 mb-1">Detail Surat Masuk</h5>
                        <button
                            data-toggle="modal"
                            data-target="#disposisiModal"
                            @click="id = suratmasuk.id"
                            type="button"
                            class="btn btn btn-sm btn-round btn-icon btn-pengguna"
                        >
                            <span class="btn-inner--icon m-1"
                                ><i
                                    class="fas fa-plus-square"
                                    aria-hidden="true"
                                ></i>
                            </span>
                            <span class="btn-inner--text m-1"
                                >Buat Disposisi</span
                            >
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered mt-3">
                                <tr>
                                    <td>Tanggal Surat Masuk</td>
                                    <td>:</td>
                                    <td>{{ suratmasuk.tanggal }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ suratmasuk.alamatSurat }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Surat</td>
                                    <td>:</td>
                                    <td>{{ suratmasuk.nomorMasuk }}</td>
                                </tr>
                                <tr>
                                    <td>Perihal</td>
                                    <td>:</td>
                                    <td>{{ suratmasuk.perihalMasuk }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        modal 1
        <div
            class="modal fade"
            id="disposisiModal"
            tabindex="-1"
            aria-labelledby="disposisiModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="disposisiModalLabel">
                            Ajukan Disposisi
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="handleDisposisi" method="post">
                            <div class="form-group">
                                <label
                                    for="recipient-name"
                                    class="col-form-label"
                                    >Dieruskan Kepada :</label
                                >
                                <select
                                    class="form-control"
                                    v-model="form.user_id"
                                >
                                    <option
                                        v-for="(user, index) in users"
                                        :key="index"
                                        :value="user.id"
                                    >
                                        {{ user.name }}
                                    </option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label>Sifat Surat</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="disposisi.tindakLanjut"
                                />
                            </div> -->
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"
                                    >Catatan :</label
                                >
                                <textarea
                                    class="form-control"
                                    id="exampleFormControlTextarea1"
                                    rows="3"
                                    v-model="form.catatan"
                                ></textarea>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal"
                                >
                                    Batal
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Kirim
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        modal 3
    </div>
</template>

<style>
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
.btn-pengguna {
    background-color: #303137 !important;
    color: #fefefe;
}
.btn-pengguna:hover {
    background-color: #303137 !important;
    color: #fefefe;
}
.text-white {
    color: white !important;
    background-color: #303137;
}
.text-white {
    color: white !important;
    background-color: #303137;
}
.card-headercoba {
    border-bottom: 0px;
}
.card-headercoba {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
}
</style>
