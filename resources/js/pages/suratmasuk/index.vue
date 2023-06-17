<script>
export default {
    data() {
        return {
            suratmasuks: [],
            successDelet: false,
        };
    },
    mounted() {
        this.getSuratMasuks();
    },
    methods: {
        getSuratMasuks() {
            this.$store
                .dispatch("getData", ["suratmasuk", {}])
                .then((response) => {
                    //console.log(response);
                    this.suratmasuks = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        handleDelet() {
            this.$store
                .dispatch("deleteData", ["/suratmasuk", this.id])
                .then((response) => {
                    this.successDelet = true;

                    this.getSuratMasuks();
                    $("#deletSuratMasukModal").modal("hide");
                    setTimeout(() => {
                        this.successDelet = false;
                    }, 3000);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        // showDokumenSurat() {
        //     let modalBody = document.getElementById("showDokumenSurat");

        //     // Menambahkan dokumen PDF
        //     let embedPDF = document.createElement("embed");
        //     embedPDF.src = "path_ke_file_dokumen.pdf";
        //     embedPDF.type = "application/pdf";
        //     modalBody.append(embedPDF);

        //     // Menambahkan dokumen DOC
        //     let embedDOC = document.createElement("embed");
        //     embedDOC.src = "path_ke_file_dokumen.doc";
        //     embedDOC.type = "application/msword";
        //     modalBody.append(embedDOC);

        //     // Menambahkan dokumen DOCX
        //     let embedDOCX = document.createElement("embed");
        //     embedDOCX.src = "path_ke_file_dokumen.docx";
        //     embedDOCX.type =
        //         "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
        //     modalBody.append(embedDOCX);
        // },
    },
};
</script>
<template>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-12 card-judul">
            <i class="fa fa-reply" aria-hidden="true"></i>

            <span class="h5 mb-0 text-gray-800 ml-2 mt-2">Surat Masuk </span>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <div
                    class="mb-3 col-12 d-flex justify-content-between align-items-center mb-md-0"
                >
                    <h5 class="mb-0 text-gray-900 mb-2">Daftar Surat Masuk</h5>

                    <router-link
                        to="/suratmasuk/create"
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
                                                Asal Surat
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
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="dataTable"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="teks: activate to sort column ascending"
                                                style="width: 40%"
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
                                                style="width: 5%"
                                            >
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            class="odd"
                                            v-for="(
                                                suratmasuks, index
                                            ) in suratmasuks"
                                            :key="index"
                                        >
                                            <td v-html="index + 1"></td>
                                            <td
                                                v-html="suratmasuks.tanggal"
                                            ></td>
                                            <td
                                                v-html="suratmasuks.alamatSurat"
                                            ></td>
                                            <td
                                                v-html="suratmasuks.nomorMasuk"
                                            ></td>
                                            <td
                                                v-html="
                                                    suratmasuks.tanggalSurat
                                                "
                                            ></td>
                                            <td
                                                v-html="
                                                    suratmasuks.perihalMasuk
                                                "
                                            ></td>
                                            <td>
                                                <button
                                                    class="btn btn-sm btn-baca m-1"
                                                    v-if="
                                                        suratmasuks.status == 1
                                                    "
                                                >
                                                    Dibaca
                                                </button>
                                                <button
                                                    v-if="
                                                        suratmasuks.status == 0
                                                    "
                                                    class="btn btn-sm btn-panding m-1"
                                                >
                                                    Panding
                                                </button>
                                            </td>
                                            <td>
                                                <div
                                                    class="d-flex alignt-items-start"
                                                >
                                                    <router-link
                                                        class="btn btn-sm btn-eye m-1"
                                                        data-toggle="modal"
                                                        data-target="#showDokumenSurat"
                                                        :to="{
                                                            name: 'ViewsSuratMasuk',
                                                            params: {
                                                                id: suratmasuks.id,
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
                                                    <button
                                                        class="btn btn-sm btn-hapus m-1"
                                                        data-toggle="modal"
                                                        data-target="#deletSuratMasukModal"
                                                        @click="
                                                            id = suratmasuks.id
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

        <!-- Modal -->
        <div
            class="modal fade"
            id="showDokumenSuratModal"
            tabindex="-1"
            aria-labelledby="showDokumenSuratModallabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- <div class="modal-header">
                    <h5 class="modal-title" id="showDokumenSuratModallabel">
                        Apakah Anda Yakin??
                    </h5>
                </div> -->
                    <div class="modal-body">
                        <h5 class="modal-title" id="showDokumenSuratModallabel">
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
                            @click="showDokumenSurat"
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
.btn-baca {
    background-color: #0f7872;
    border-color: #0f7872;
    color: #fefefe;
}
.btn-baca:hover {
    background-color: #0f7872;
    border-color: #0f7872;
    color: #fefefe;
}
.btn-panding {
    background-color: #090d0d;
    border-color: #090d0d;
    color: #fefefe;
}
.btn-panding:hover {
    background-color: #090d0d;
    border-color: #090d0d;
    color: #fefefe;
}
</style>
