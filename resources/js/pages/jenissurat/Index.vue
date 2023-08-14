<script>
import Cookies from "js-cookie";
export default {
    data() {
        return {
            jenissurats: [],
            paginate: {
                total: 0,
                perPage: 10,
                currentPage: 1,
                lastPage: 0,
                page: 1,
            },
            isLoading: false,
        };
    },
    components: {
        paginate,
        loading,
    },
    mounted() {
        this.getJenisSurats();
    },
    methods: {
        getJenisSurats() {
            const params = [
                `search=${this.search}`,
                `page=${this.paginate.page}`,
                `per_page=${this.paginate.perPage}`,
            ].join("&");
            this.isLoading = true;
            this.$store
                .dispatch("getData", ["jenissurat", {}])
                .then((response) => {
                    this.jenissurats = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        handleDelet() {
            this.$store
                .dispatch("deleteData", ["jenissurat", this.id])
                .then((response) => {
                    this.successDelet = true;

                    this.getJenisSurats();
                    $("#deletJenissuratModal").modal("hide");
                    setTimeout(() => {
                        this.successDelet = false;
                    }, 3000);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getUser() {
            const data = Cookies.get("user");
            const parsing = JSON.parse(data);
            const role = parsing.data.idRole;
            console.log(role);
        },
    },
};
</script>
<template>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-12 card-judul">
            <i class="fa fa-folder" aria-hidden="true"></i>

            <span class="h5 mb-0 text-gray-800 ml-2 mt-2">Jenis Surat </span>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <div
                    class="mb-3 col-12 d-flex justify-content-between align-items-center mb-md-0"
                >
                    <h5 class="mb-0 text-gray-900 mb-2">
                        Daftar Jenis-Jenis Surat
                    </h5>

                    <router-link
                        to="/jenissurat/create"
                        type="button"
                        class="btn btn btn-sm btn-round btn-icon btn-pengguna"
                    >
                        <span class="btn-inner--icon m-1"
                            ><i class="fa fa-list" aria-hidden="true"></i>
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
                            <div class="col-sm-6 mb-3">
                                <div
                                    class="d-flex px-12 align-items-center margin-100px-bottom"
                                >
                                    <label for="" class="px-3 mb-0"
                                        >Cari
                                    </label>
                                    <input
                                        type="text"
                                        name=""
                                        email=""
                                        placeholder="Masukan Data Surat"
                                        class="form-control form-control-sm"
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
                                                style="width: 2%"
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
                                                style="width: 10%"
                                            >
                                                Nama Surat
                                            </th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="name: activate to sort column ascending"
                                                style="width: 10%"
                                            >
                                                Nomor Surat
                                            </th>

                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 1%"
                                            >
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            class="odd"
                                            v-for="(
                                                jenissurats, index
                                            ) in jenissurats"
                                            :key="index"
                                        >
                                            <td v-html="index + 1"></td>

                                            <td v-html="jenissurats.nama"></td>

                                            <td
                                                v-html="jenissurats.nomorSurat"
                                            ></td>
                                            <td>
                                                <div
                                                    class="d-flex alignt-items-start"
                                                >
                                                    <!-- <router-link
                                                        class="btn btn-sm btn-warning m-1"
                                                        :to="{
                                                            name: 'Edit Jenis',
                                                            params: {
                                                                id: jenissurats.id,
                                                            },
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
                                                    </router-link> -->
                                                    <button
                                                        class="btn btn-sm btn-hapus m-1"
                                                        data-toggle="modal"
                                                        data-target="#deletJenissuratModal"
                                                        @click="
                                                            id = jenissurats.id
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
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="deletJenissuratModal"
            tabindex="-1"
            aria-labelledby="deletJenissuratModallabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- <div class="modal-header">
                    <h5 class="modal-title" id="deletJenissuratModallabel">
                        Apakah Anda Yakin??
                    </h5>
                </div> -->
                    <div class="modal-body">
                        <h5 class="modal-title" id="deletJenissuratModallabel">
                            Apakah anda yakin ingin menghapus data tersebut?
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-pengguna"
                            data-dismiss="modal"
                        >
                            Close
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
.btn-danger {
    background-color: #4ba3f0;
    border-color: #4ba3f0;
}
.btn-danger:hover {
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
.btn-danger {
    background-color: #f90d0d;
    border-color: #f90d0d;
    color: #fefefe;
}
.btn-danger:hover {
    background-color: #f90d0d;
    border-color: #f90d0d;
    color: #fefefe;
}
</style>
