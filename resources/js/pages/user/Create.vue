<template>
    <!-- Start Component -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-12 card-judul">
            <h3 class="h3 mb-2 text-gray-800">Tambah Pengguna</h3>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow col-lg-8 mb-4">
            <div class="card-header">
                <div
                    class="mb-3 col-4 d-flex justify-content-between align-items-center mb-md-1"
                >
                    <router-link
                        to="/user"
                        class="btn icon icon-shape bg-red text-white rounded-circle"
                    >
                        <i
                            class="fa fa-arrow-circle-left"
                            aria-hidden="true"
                        ></i>
                    </router-link>
                    <h5 class="mr-0 text-gray-900">Creat User</h5>
                </div>
            </div>
            <!-- Content -->
            <div class="card-body">
                <div class="responsive">
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"
                                            >Role</label
                                        >
                                        <select
                                            class="form-control"
                                            id="exampleFormControlSelect1"
                                        >
                                            <option>Petugas</option>
                                            <option>Pemimpin</option>
                                            <option>Guru</option>
                                            <option>Siswa</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"
                                            >Nama Lengkap</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="exampleFormControlInput1"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"
                                            >Email</label
                                        >
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="exampleFormControlInput1"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"
                                            >Jenis Kelamin</label
                                        >
                                        <select
                                            class="form-control"
                                            id="exampleFormControlSelect1"
                                        >
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"
                                            >No Hp</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="exampleFormControlInput1"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"
                                            >Alamat</label
                                        >
                                        <textarea
                                            class="form-control"
                                            id="exampleFormControlTextarea1"
                                            rows="3"
                                        ></textarea>
                                    </div>
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Creat User
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
