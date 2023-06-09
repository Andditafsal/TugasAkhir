<template>
    <!-- Start Component -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-12 card-judul">
            <h5 class="h5 mb-2 text-gray-800">Tambah Surat Masuk</h5>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow col-lg-12 mb-4">
            <div class="card-header">
                <div class="mb-3 col-8 d-flex align-items-center mb-md-1">
                    <router-link
                        to="/suratmasuk"
                        class="btn icon icon-shape bg-red text-white rounded-circle"
                    >
                        <i
                            class="fa fa-arrow-circle-left"
                            aria-hidden="true"
                        ></i>
                    </router-link>
                    <h5 class="mb-0 mr-0 text-gray-900 px-3">
                        Tambah Data Surat Keluar
                    </h5>
                </div>
            </div>
            <!-- Content -->
            <div class="card-body">
                <div class="responsive">
                    <div>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div
                                    class="d-flex px-12 align-items-center margin-100px-bottom"
                                >
                                    <i
                                        class="fa fa-folder"
                                        aria-hidden="true"
                                    ></i>
                                    <label for="" class="px-1 mb-0"
                                        >Data Surat</label
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">No Agenda *</label>
                                            <input
                                                type="int"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Jenis Surat *</label>
                                            <select class="form-control">
                                                <option>
                                                    Surat Tugas Monitoring PKL
                                                </option>
                                                <option>
                                                    Surat Penarikan Peserta PKL
                                                </option>
                                                <option>
                                                    Surat Pengantar PKL
                                                </option>
                                                <option>
                                                    Surat Panggilan Orang Tua
                                                </option>

                                                <option>
                                                    Surat Izin Atasan
                                                </option>
                                                <option>
                                                    Surat Dispen Siswa
                                                </option>
                                                <option>
                                                    Surat Akrif Siswa
                                                </option>
                                                <option>Surat Diterima</option>

                                                <option>
                                                    Surat Pengambilan Raport
                                                </option>
                                                <option>
                                                    Surat Undangan Brefing
                                                </option>
                                                <option>
                                                    Surat Rapat Koordinasi
                                                </option>
                                                <option>
                                                    Surat Pengesian E-Raport
                                                </option>
                                                <option>
                                                    Permohonan Surat Keluar
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Nomor Surat *</label>
                                            <input
                                                type="int"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=""
                                                >Tanggal Surat *</label
                                            >
                                            <input
                                                type="date"
                                                class="form-control"
                                            />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Lampiran *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Perihal *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                            />
                                        </div>

                                        <fieldset class="form-group col-12">
                                            <div class="row">
                                                <legend
                                                    class="col-form-label col-sm-2 pt-0"
                                                >
                                                    Diajukan Kepada:
                                                </legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="gridRadios"
                                                            id="gridRadios1"
                                                            value="option1"
                                                            checked
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="gridRadios1"
                                                        >
                                                            Kepala Sekolah
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="gridRadios"
                                                            id="gridRadios2"
                                                            value="option2"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="gridRadios2"
                                                        >
                                                            Guru
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="row col-12">
                                            <div class="col-md-0">
                                                <div class="col-sm-6 mb-3">
                                                    <div
                                                        class="d-flex px-12 align-items-center margin-100px-bottom"
                                                    >
                                                        <i
                                                            class="fa fa-folder"
                                                            aria-hidden="true"
                                                        ></i>
                                                        <label
                                                            for=""
                                                            class="px-1 mb-0"
                                                            >Kegiatan</label
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Kegiatan *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>Tanggal Kegiatan *</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label
                                                >Waktu Kegiatan (Mulai) *</label
                                            >
                                            <input
                                                type="time"
                                                class="form-control"
                                                placeholder="1234 Main St"
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label
                                                >Waktu Kegiatan (Akhir) *</label
                                            >
                                            <input
                                                type="time"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-6 mb-3">
                                            <div
                                                class="d-flex px-12 align-items-center margin-100px-bottom"
                                            >
                                                <i
                                                    class="fa fa-folder"
                                                    aria-hidden="true"
                                                ></i>
                                                <label for="" class="px-1 mb-0"
                                                    >Pengirim</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Pengirim *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label>Email *</label>
                                            <input
                                                type="email"
                                                class="form-control"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-primary mt-3"
                                    >
                                        Create Surat
                                    </button>
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
</style>
