<script>
export default {
    data() {
        return {
            users: [],
            successDelet: false,
        };
    },
    mounted() {
        this.getUsers();
    },
    methods: {
        search() {
            axios
                .get("/api/search", {
                    params: {
                        name: this.name,
                    },
                })
                .then((response) => {
                    this.results = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        getUsers() {
            this.$store
                .dispatch("getData", ["user", {}])
                .then((response) => {
                    this.users = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        handleDelet() {
            this.$store
                .dispatch("deleteData", ["user", this.id])
                .then((response) => {
                    this.successDelet = true;
                    this.getUsers();
                    $("#deletUserModal").modal("hide");
                    setTimeout(() => {
                        this.successDelet = false;
                    }, 3000);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
<template>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-12 card-judul">
            <i class="fa fa-users" widht="100" aria-hidden="true"></i>
            <span class="h5 mb-0 text-gray-800 ml-2">Pengguna </span>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <div
                    class="mb-3 col-12 d-flex justify-content-between align-items-center mb-md-0"
                >
                    <h5 class="mb-0 text-gray-900 mb-2">Daftar Pengguna</h5>

                    <router-link
                        to="/user/create"
                        type="button"
                        class="btn btn btn-sm btn-round btn-icon btn-pengguna"
                        v-if="$can('action', 'Admin')"
                    >
                        <span class="btn-inner--icon m-1"
                            ><i
                                class="fas fa-plus-square"
                                aria-hidden="true"
                            ></i>
                        </span>
                        <span class="btn-inner--text m-1">Tambah Pengguna</span>
                    </router-link>
                </div>
            </div>
            <div v-if="successDelet" class="alert alert-success">
                Data berhasil dihapus
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
                                    <label for="" class="px-1 mb-0">Cari</label>
                                    <input
                                        type="text"
                                        name=""
                                        email=""
                                        placeholder="Nama & Email"
                                        class="form-control form-control-sm"
                                        v-html="this.name"
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
                                                    width: 3%;
                                                    text-align: center;
                                                "
                                            >
                                                <div>No</div>
                                            </th>
                                            <th
                                                class="sorting sorting_asc"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20%"
                                            >
                                                Nama Lengkap
                                            </th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="email: activate to sort column ascending"
                                                style="width: 15%"
                                            >
                                                Email
                                            </th>

                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Number: activate to sort column ascending"
                                                style="width: 10%"
                                            >
                                                No Telephone
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
                                            v-for="(user, index) in users"
                                            :key="index"
                                        >
                                            <th v-html="index + 1"></th>
                                            <td v-html="user.name"></td>
                                            <td v-html="user.email"></td>
                                            <td v-html="user.noHp"></td>

                                            <td>
                                                <div
                                                    class="d-flex alignt-items-start"
                                                >
                                                    <router-link
                                                        class="btn btn-sm btn-eye m-1"
                                                        :to="{
                                                            name: 'Views User',
                                                            params: {
                                                                id: user.id,
                                                            },
                                                        }"
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
                                                    </router-link>
                                                    <router-link
                                                        class="btn btn-sm btn-create m-1"
                                                        :to="{
                                                            name: 'Edit User',
                                                            params: {
                                                                id: user.id,
                                                            },
                                                        }"
                                                        v-if="
                                                            $can(
                                                                'action',
                                                                'Admin'
                                                            )
                                                        "
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
                                                    </router-link>
                                                    <button
                                                        class="btn btn-sm btn-hapus m-1"
                                                        data-toggle="modal"
                                                        data-target="#deletUserModal"
                                                        @click="id = user.id"
                                                        v-if="
                                                            $can(
                                                                'action',
                                                                'Admin'
                                                            )
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
    </div>

    <!-- Modal -->
    <div
        class="modal fade"
        id="deletUserModal"
        tabindex="-1"
        aria-labelledby="deletUserModallabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="deletUserModallabel">
                        Apakah Anda Yakin??
                    </h5>
                </div> -->
                <div class="modal-body">
                    <h5 class="modal-title" id="deletUserModallabel">
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
.btn-create {
    background-color: #f1924c;
    border-color: #f1924c;
}
.btn-create:hover {
    background-color: #f1924c;
    border-color: #f1924c;
    color: #fefefe;
}
.btn-hapus {
    background-color: #e85345;
    border-color: #e85345;
}
.btn-hapus:hover {
    background-color: #e85345;
    border-color: #e85345;
    color: #fefefe;
}
.admin {
    background-color: #303137;
    border-color: #303137;
}
.admin:hover {
    background-color: #303137;
    border-color: #303137;
    color: #fefefe;
}
.pemimpin {
    background-color: #0f9662ce;
    border-color: #0f9662ce;
}
.pemimpin:hover {
    background-color: #0f9662ce;
    border-color: #0f9662ce;
    color: #fefefe;
}
.petugas {
    background-color: #d41f5ece;
    border-color: #d41f5ece;
}
.petugas:hover {
    background-color: #d41f5ece;
    border-color: #d41f5ece;
    color: #fefefe;
}
.guru {
    background-color: #981fd4ce;
    border-color: #981fd4ce;
}
.guru:hover {
    background-color: #981fd4ce;
    border-color: #981fd4ce;
    color: #fefefe;
}
.siswa {
    background-color: #1f9bd4ce;
    border-color: #1f9bd4ce;
}
.siswa:hover {
    background-color: #1f9bd4ce;
    border-color: #1f9bd4ce;
    color: #fefefe;
}

.bg-inverse-success {
    background-color: rgba(15, 183, 107, 0.12) !important;
    color: #26af48 !important;
}
.modal-footer {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: flex-end;
    padding: 0.75rem;
    border-top: 0px solid #e3e6f0;
    border-bottom-right-radius: calc(0.3rem - 1px);
    border-bottom-left-radius: calc(0.3rem - 1px);
}
.modal-content {
    width: 80%;
    margin-left: 30%;
    margin-top: 50%;
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
