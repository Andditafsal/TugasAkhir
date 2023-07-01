<script>
export default {
    props: ["id"],
    data() {
        return {
            suratmasuk: {},
        };
    },
    mounted() {
        this.getSuratMasuk();
    },
    methods: {
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
                            data-target="#exampleModal"
                            data-whatever="@getbootstrap"
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
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
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
                        <form>
                            <label for="recipient-name" class="col-form-label"
                                >Disposisi Kepada :</label
                            >
                            <div class="row">
                                <div class="container">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div
                                                class="custom-control custom-checkbox my-1 mr-sm-2"
                                            >
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    id="customControlInline"
                                                />
                                                <label
                                                    class="custom-control-label"
                                                    for="customControlInline"
                                                    >Wakil Kesiswaan</label
                                                >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div
                                                class="custom-control custom-checkbox my-1 mr-sm-2"
                                            >
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    id="customControlInline"
                                                />
                                                <label
                                                    class="custom-control-label"
                                                    for="customControlInline"
                                                    >Wakil Kesiswaan</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"
                                    >Catatan :</label
                                >
                                <textarea
                                    class="form-control"
                                    id="exampleFormControlTextarea1"
                                    rows="3"
                                ></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Batal
                        </button>
                        <button type="button" class="btn btn-primary">
                            Kirim
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
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
