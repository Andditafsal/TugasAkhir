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
                        Creat Surat Masuk
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
                                            <label for="">Tanggal *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Asal Surat *</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Nomor Surat *</label>
                                            <input
                                                type="string"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Perial *</label>
                                            <input
                                                type="string"
                                                class="form-control"
                                            />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="">Upload Surat *</label>
                                            <input
                                                type="file"
                                                class="form-control"
                                            />
                                        </div>
                                    </div>
                                    <button
                                        type="submit"
                                        class="btn btn-primary text-center col-1 m-1"
                                    >
                                        Save
                                    </button>
                                    <button
                                        type="submit"
                                        class="btn btn-cancel text-center col-1"
                                    >
                                        Cancle
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
.btn-cancel {
    background-color: #7a7a7a;
    color: white !important;
}
</style>
