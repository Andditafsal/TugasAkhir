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
                    <h5 class="card-title text-center">Detail Surat</h5>
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
    </div>
</template>

<style>
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
