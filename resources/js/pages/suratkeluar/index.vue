<template>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-12 card-judul">
            <i class="fa fa-share" aria-hidden="true"></i>
            <span class="h5 mb-0 text-gray-800 ml-2 mt-2">Surat Keluar </span>
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
                            <div class="col-sm-6 mb-3">
                                <div
                                    class="d-flex px-12 align-items-center margin-100px-bottom"
                                >
                                    <label for="" class="px-1 mb-0"
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
                                                style="
                                                    width: 10%;
                                                    text-align: center;
                                                "
                                            >
                                                No Agenda
                                            </th>
                                            <th
                                                class="sorting sorting_asc"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Number: activate to sort column descending"
                                                style="width: 15%"
                                            >
                                                Tanggal Diterima
                                            </th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="name: activate to sort column ascending"
                                                style="width: 20%"
                                            >
                                                Pengaju
                                            </th>

                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="teks: activate to sort column ascending"
                                                style="width: 20%"
                                            >
                                                Perihal
                                            </th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="teks: activate to sort column ascending"
                                                style="width: 20%"
                                            >
                                                Jenis Surat
                                            </th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 5%"
                                            >
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td>001</td>
                                            <td>18-10-2023</td>
                                            <td>andita.aa.aa</td>
                                            <td>Pelaksanaan Rapat</td>
                                            <td>Surat Undangan</td>
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
                                                    <button
                                                        class="btn btn-sm btn-warning m-1"
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
                                                    </button>

                                                    <button
                                                        class="btn btn-sm btn-danger m-1"
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
</style>
