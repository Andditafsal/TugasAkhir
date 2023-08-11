<script>
export default {
    data() {
        return {
            all: [],
        };
    },
    created() {
        //this.SuratMasukCount();
        //this.SuratKeluarCount();
        this.UserCount();
    },
    methods: {
        UserCount() {
            this.$store
                .dispatch("getData", ["count/all"])
                .then((response) => {
                    this.all = response.data;
                    //console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });

            // .get("/surat_masuk")
            // .then((response) => {
            //     // this.count = response.data.count;
            //     console.log(response.data);
            // })
            // .catch((error) => {
            //     console.error(error);
            // });
        },
    },
};
</script>
<template>
    <!-- Start Component -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content mb-4">
            <span class="h5 mb-0 text-gray-800 ml-2">
                <b v-if="$can('action', 'Admin')">Selamat Datang Admin</b>
                <b v-if="$can('action', 'Petugas')">Selamat Datang Petugas</b>
                <b v-if="$can('action', 'Pemimpin')"
                    >Selamat Datang Kepala Sekolah</b
                >
                <b v-if="$can('action', 'Wakasek')"
                    >Selamat Datang Wakil Kesiswaan</b
                >
                <b v-if="$can('action', 'Guru')">Selamat Datang Pengguna</b>
                <i style="font-size: 24px" class="far">&#xf259;</i>
            </span>
        </div>
        <!-- Tab -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                                >
                                    Surat Masuk
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                    v-for="data in all"
                                    :key="data"
                                >
                                    {{ data.suratMasuk }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-envelope fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                >
                                    Surat Keluar
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                    v-for="data in all"
                                    :key="data"
                                >
                                    {{ data.suratKeluar }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-envelope-open fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                >
                                    Disposisi
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                    v-for="data in all"
                                    :key="data"
                                >
                                    {{ data.disposisi }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i
                                    class="fas fa-envelope-open fa-2x text-gray-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div
                                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                >
                                    Pengguna
                                </div>
                                <div
                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                    v-for="data in all"
                                    :key="data"
                                >
                                    <p>
                                        {{ data.user }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
        </div>
    </div>

    <!-- chart -->

    <!-- end Component -->
</template>
