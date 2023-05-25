<script>
export default {
    props: ["id"],
    data() {
        return {
            form: {
                nama: "",
                nomorSurat: "",
            },
            erorr: {},
            isDisabled: false,
        };
    },
    mounted() {
        this.getJenissurat();
    },
    methods: {
        setForm(jenissurats) {
            this.form = {
                nomorSurat: jenissurats.nomorSurat,
                nama: jenissurats.nama,
            };
        },
        getJenissurat() {
            this.$store
                .dispatch("showData", ["jenissurat", this.id])
                .then((response) => {
                    this.setForm(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        handleSubmit() {
            this.isDisabled = true;

            let formData = new FormData();
            formData.append("_method", "put");
            formData.append("nama", this.form.nama);
            formData.append("nomor_surat", this.form.nomorSurat);

            this.$store
                .dispatch("postDataUpload", ["jenissurat/" + this.id, formData])
                .then((result) => {
                    this.isDisabled = false;
                    this.$router.push({ name: "JenisSurat" });
                    console.log(result);
                    console.log("ada");
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
            <h5 class="h5 mb-2 text-gray-800">Edit Jenis Surat</h5>
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
                        Edit Jenis Surat
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
                                            v-model="form.nama"
                                            :disabled="isDisabled"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Nama Surat *</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            v-model="form.nomorSurat"
                                            :disabled="isDisabled"
                                        />
                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-primary text-center col-2 m-1"
                                        :disabled="isDisabled"
                                    >
                                        Save
                                    </button>
                                    <router-link
                                        :to="{ name: 'JenisSurat' }"
                                        type="submit"
                                        class="btn btn-cancel text-center col-2"
                                        :class="{ disabled: isDisabled }"
                                    >
                                        Cancle
                                    </router-link>
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
