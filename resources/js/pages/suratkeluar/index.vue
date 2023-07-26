<script>
import iziToast from "izitoast";
import loading from "../../core/layout/table-loading.vue";
import paginate from "../../core/layout/paginate.vue";
export default {
    data() {
        return {
            suratkeluars: [],
            paginate: {
                total: 0,
                perPage: 10,
                currentPage: 1,
                lastPage: 0,
                page: 1,
            },
            isLoading: false,
            search: "",
        };
    },
    components: {
        paginate,
        loading,
    },
    mounted() {
        this.getSuratKeluars();
    },
    methods: {
        getSuratKeluars() {
            const params = [
                `search=${this.search}`,
                `page=${this.paginate.page}`,
                `per_page=${this.paginate.perPage}`,
            ].join("&");
            this.isLoading = true;
            this.$store
                .dispatch("getData", ["suratkeluar", params])
                .then((response) => {
                    //console.log(response);
                    this.suratkeluars = response.data;
                    this.paginate.total = response.meta.total;
                    this.paginate.perPage = response.meta.perPage;
                    this.paginate.currentPage = response.meta.currentPage;
                    this.paginate.lastPage = response.meta.lastPage;
                    this.isLoading = false;
                })
                .catch((error) => {
                    console.log(error);
                    //er
                });
        },
        handleDelet() {
            this.successDelet = true;
            this.$store
                .dispatch("deleteData", ["/suratkeluar", this.id])
                .then((response) => {
                    iziToast.success({
                        title: "success",
                        message: "data berhasil dihapus",
                        position: "topRight",
                        timeout: 1000,
                    });
                    this.getSuratKeluars();
                    $("#deletSuratMasukModal").modal("hide");
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        onSearch() {
            this.getSuratKeluars();
        },
        onPageChange(page) {
            this.paginate.page = page;
            this.getSuratKeluars();
        },
        exportData() {
            window.location.href = "/exportsuratkeluar";
        },
    },
};
</script>
<template>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-12 card-judul">
            <i class="fa fa-reply" aria-hidden="true"></i>

            <span class="h5 mb-0 text-gray-800 ml-2 mt-2">Surat keluar </span>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <div
                    class="mb-3 col-12 d-flex justify-content-between align-items-center mb-md-0"
                >
                    <h5 class="mb-0 text-gray-900 mb-2">Daftar Surat Keluar</h5>

                    <router-link
                        to="/suratkeluar/create"
                        type="button"
                        class="btn btn btn-sm btn-round btn-icon btn-pengguna"
                    >
                        <span class="btn-inner--icon m-1"
                            ><i
                                class="fas fa-plus-square"
                                aria-hidden="true"
                            ></i>
                        </span>
                        <span class="btn-inner--text m-1">Tambah Data</span>
                    </router-link>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div
                        id="dataTable_wrapper"
                        class="dataTables_wrapper dt-bootstrap4"
                    >
                        <div class="row">
                            <div
                                class="mb-6 col-12 d-flex justify-content-between align-items-center mb-md-1"
                            >
                                <div
                                    class="d-flex px-12 align-items-center margin-100px-bottom"
                                >
                                    <button
                                        @click="exportData"
                                        class="d-flex px-12 align-items-center margin-100px-bottom exportData"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-file-earmark-arrow-down-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"
                                            />
                                        </svg>
                                        <span class="btn-inner--text m-1"
                                            >Excel</span
                                        >
                                    </button>
                                    <label for="" class="px-1 mb-0"></label>
                                    <select
                                        name="dataTable_length"
                                        aria-controls="dataTable"
                                        class="custom-select custom-select-sm form-control form-control-sm"
                                    >
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                                <div
                                    class="d-flex px-12 align-items-center margin-100px-bottom"
                                >
                                    <label for="" class="px-2 mb-0">Cari</label>
                                    <input
                                        type="text"
                                        placeholder="Perihal "
                                        class="form-control form-control-sm"
                                        v-model="search"
                                        @input="onSearch"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table
                                    class="table table-bordered dataTable"
                                    id="dataTable"
                                    width="100%"
                                    cellspacing="0"
                                    role="grid"
                                    aria-describedby="dataTable_info"
                                    style="width: 100%"
                                >
                                    <thead>
                                        <tr role="row" class="tabel-judul">
                                            <th
                                                role="rol"
                                                scope="col"
                                                aria-colindex="1"
                                                class=""
                                                style="
                                                    width: 5%;
                                                    text-align: center;
                                                "
                                            >
                                                No
                                            </th>
                                            <th
                                                class="sorting sorting_asc"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Number: activate to sort column descending"
                                                style="width: 17%"
                                            >
                                                Tanggal
                                            </th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="name: activate to sort column ascending"
                                                style="width: 30%"
                                            >
                                                Kantor Instansi/Yang Dituju
                                            </th>

                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="teks: activate to sort column ascending"
                                                style="width: 25%"
                                            >
                                                Nomor Surat
                                            </th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="teks: activate to sort column ascending"
                                                style="width: 15%"
                                            >
                                                Tanggal Surat
                                            </th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="teks: activate to sort column ascending"
                                                style="width: 40%"
                                            >
                                                Perihal
                                            </th>

                                            <th
                                                class="sorting sorting_asc"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Number: activate to sort column descending"
                                                style="width: 100%"
                                            >
                                                Status
                                            </th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 3%"
                                            >
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody v-if="isLoading">
                                        <loading />
                                    </tbody>
                                    <tbody>
                                        <tr
                                            class="odd"
                                            v-for="(
                                                suratkeluars, index
                                            ) in suratkeluars"
                                            :key="index"
                                        >
                                            <td v-html="index + 1"></td>
                                            <td>Tangal Surat</td>
                                            <td
                                                v-html="suratkeluars.kepada"
                                            ></td>
                                            <td
                                                v-html="suratkeluars.perihal"
                                            ></td>
                                            <td>
                                                <span>cobaee</span>
                                                <span>cobaa</span>
                                                <span>rrr</span>
                                            </td>
                                            <td>Surat Undangan</td>
                                            <td>
                                                <button
                                                    class="badge bg-inverse-statuss"
                                                >
                                                    <i
                                                        class="fa fa-check"
                                                        aria-hidden="true"
                                                    ></i>
                                                    Dibaca
                                                </button>

                                                <button
                                                    class="badge bg-inverse-status"
                                                >
                                                    <i
                                                        class="fa fa-spinner"
                                                        aria-hidden="true"
                                                    ></i>
                                                    Diproses
                                                </button>
                                                <button
                                                    class="badge bg-inverse-lanjut"
                                                >
                                                    <i
                                                        class="fa fa-arrow-up"
                                                        aria-hidden="true"
                                                    ></i>
                                                    Ditindaklanjuti
                                                </button>
                                                <button
                                                    class="badge bg-inverse-batal"
                                                >
                                                    <i
                                                        class="fa fa-times"
                                                        aria-hidden="true"
                                                    ></i>
                                                    Dibatalkan
                                                </button>
                                            </td>
                                            <td>
                                                <div
                                                    class="d-flex alignt-items-start"
                                                >
                                                    <routerlink
                                                        to="/user/cretae"
                                                        class="btn btn-sm btn-eye m-1"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="16"
                                                            height="16"
                                                            fill="currentColor"
                                                            class="bi bi-eye"
                                                            viewBox="0 0 16 16"
                                                        >
                                                            <path
                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
                                                            />
                                                            <path
                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"
                                                            />
                                                        </svg>
                                                    </routerlink>
                                                    <routerlink
                                                        class="btn btn-sm btn-create m-1"
                                                        :to="{
                                                            name: 'Edit User',
                                                            params: {},
                                                        }"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="16"
                                                            height="16"
                                                            fill="currentColor"
                                                            class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16"
                                                        >
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                                            />
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                                            />
                                                        </svg>
                                                    </routerlink>
                                                    <!-- <router-link
                                                        :to="{
                                                            name: 'CetakSuratKeluar',
                                                            params: { id: 2 },
                                                        }"
                                                        target="_blank"
                                                        class="btn btn-sm btn-print m-1"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="16"
                                                            height="16"
                                                            fill="currentColor"
                                                            class="bi bi-printer"
                                                            viewBox="0 0 16 16"
                                                        >
                                                            <path
                                                                d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"
                                                            />
                                                            <path
                                                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"
                                                            />
                                                        </svg>
                                                    </router-link> -->
                                                    <!-- <button
                                                        class="btn btn-sm btn-signature m-1"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="16"
                                                            height="16"
                                                            fill="currentColor"
                                                            class="bi bi-pen"
                                                            viewBox="0 0 16 16"
                                                        >
                                                            <path
                                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"
                                                            />
                                                        </svg>
                                                    </button> -->
                                                    <!-- <button
                                                        class="btn btn-sm btn-signature m-1"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="16"
                                                            height="16"
                                                            fill="currentColor"
                                                            class="bi bi-box-arrow-down"
                                                            viewBox="0 0 16 16"
                                                        >
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"
                                                            />
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"
                                                            />
                                                        </svg>
                                                    </button> -->
                                                    <button
                                                        class="btn btn-sm btn-hapus m-1"
                                                        data-toggle="modal"
                                                        data-target="#deletSuratMasukModal"
                                                        @click="
                                                            id = suratkeluars.id
                                                        "
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="16"
                                                            height="16"
                                                            fill="currentColor"
                                                            class="bi bi-trash3"
                                                            viewBox="0 0 16 16"
                                                        >
                                                            <path
                                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"
                                                            />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mb-3 col-12 d-flex justify-content-between align-items-center mb-md-0"
                    >
                        <h5 class="mb-0 text-gray-900 mb-2"></h5>
                        <paginate
                            :currentPage="paginate.currentPage"
                            :rowsTotal="paginate.total"
                            :lastPage="paginate.lastPage"
                            @onPageChange="onPageChange($event)"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div
        class="modal fade"
        id="deletSuratMasukModal"
        tabindex="-1"
        aria-labelledby="deletSuratMasukModallabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="deletSuratMasukModallabel">
                        Apakah Anda Yakin??
                    </h5>
                </div> -->
                <div class="modal-body">
                    <h5 class="modal-title" id="deletSuratMasukModallabel">
                        Apakah anda yakin ingin menghapus data tersebut?
                    </h5>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-pengguna"
                        data-dismiss="modal"
                    >
                        Tutup
                    </button>
                    <button
                        type="button"
                        class="btn btn-danger"
                        @click="handleDelet"
                    >
                        Delet
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.btn-pengguna {
    background-color: #303137 !important;
}
.btn-pengguna:hover {
    background-color: #303137 !important;
    color: #fefefe;
}
.btn {
    color: #fefefe;
}
.text-pengguna {
    color: black;
}
.card-header {
    background-color: #fefefe;
}
.tabel-judul {
    background-color: #303137 !important;
    color: #fefefe;
}
.card-judul {
    margin-bottom: 30px;
}
.btn-eye {
    background-color: #1cc88a;
    border-color: #1cc88a;
}
.btn-eye:hover {
    background-color: #1cc88a;
    border-color: #1cc88a;
    color: #fefefe;
}
.btn-print {
    background-color: #4ba3f0;
    border-color: #4ba3f0;
}
.btn-print:hover {
    background-color: #4ba3f0;
    border-color: #4ba3f0;
    color: #fefefe;
}

.btn-hapus {
    background-color: #e85345;
    border-color: #e85345;
    color: #fefefe;
}
.btn-hapus:hover {
    background-color: #e85345;
    border-color: #e85345;
    color: #fefefe;
}

.btn-signature {
    background-color: #000000;
    border-color: #000000;
    color: #fefefe;
}
.btn-signature:hover {
    background-color: #0c0b0e;
    border-color: #0b0e0d;
    color: #fefefe;
}
.btn-create {
    background-color: #f1924c;
    border-color: #f1924c;
}
.btn-create:hover {
    background-color: #f1924c;
    border-color: #f1924c;
    color: #fefefe;
}
.bg-inverse-disposisi {
    background-color: rgb(162, 162, 59) !important;
    color: white !important;
    border-color: rgb(162, 162, 59);
}
.bg-inverse-statuss {
    background-color: rgb(48, 141, 255) !important;
    color: white !important;
    border-color: rgb(48, 141, 255);
}
.bg-inverse-status {
    background-color: green !important;
    color: white !important;
    border-color: green;
}
.exportData {
    background-color: #04aa6d;
    color: #fff;
    border-color: #04aa6d;
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 0;

    border: 1px solid #04aa6d;
    border-radius: 8%;
}
.exportData:hover {
    background-color: #04aa6d;
    color: #fff;
    border-color: #04aa6d;
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    border-radius: 8%;
    margin-left: -1px;
    line-height: 0;

    border: 1px solid #04aa6d;
}
.bg-inverse-lanjut {
    background-color: #e7e117 !important;
    color: white !important;
    border-color: #e7e117;
}
.bg-inverse-batal {
    background-color: red !important;
    color: white !important;
    border-color: red;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #252628;
    border-color: #252628;
}

.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #1c1d21;
    background-color: #fff;
    border: 1px solid #dddfeb;
}

.page-link:hover {
    z-index: 2;
    color: #1c1d21;
    text-decoration: none;
    background-color: #eaecf4;
    border-color: #dddfeb;
}
</style>
