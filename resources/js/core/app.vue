<script>
import Sidebar from "./layout/sidebar.vue";
import Headers from "./layout/header.vue";
import Footers from "./layout/footer.vue";
import Cookies from "js-cookie";

export default {
    watch: {
        "$route.params.search": {
            handler: function (search) {
                this.$store
                    .dispatch("postData", ["/auth/check", {}])
                    .then((response) => {})
                    .catch((error) => {
                        window.location.href = "/auth/login";
                        Cookies.remove("token");
                    });
                if (Cookies.get("token") == undefined) {
                    window.location.href = "/auth/login";
                }
            },
            deep: true,
            immediate: true,
        },
    },
    methods: {
        handleLogout() {
            this.$store
                .dispatch("postData", ["/auth/logout", {}])
                .then((response) => {
                    Cookies.remove("token");
                    window.location.href = "/auth/login";
                })
                .catch((error) => {});
        },
    },
    computed: {
        bebas() {
            return this.$route.name != "CetakSuratKeluar";
        },
    },
    components: {
        Sidebar,
        Headers,
        Footers,
    },
};
</script>

<template>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <sidebar v-if="bebas" />
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <headers v-if="bebas" />
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->

                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <router-view></router-view>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <Footers v-if="bebas" />
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div
            class="modal fade"
            id="logoutModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Logout?
                        </h5>
                        <button
                            class="close"
                            type="button"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Ingin keluar dari aplikasi</div>
                    <div class="modal-footer">
                        <button
                            class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal"
                        >
                            Batal
                        </button>
                        <button class="btn btn-primary" @click="handleLogout()">
                            Keluar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>

<style>
.btn-primary {
    background-color: #4e73df;
    border-color: #4e73df;
}
</style>
