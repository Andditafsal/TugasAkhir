<script>
export default {
    data() {
        return {
            user: {
                profilePicture: "/img/profile.png",
            },
        };
    },
};
</script>
<template>
    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- <div class="col-lg-6 mb-4">
            <div class="card-headercoba">
                <div class="mb-3 col-7 d-flex align-items-center mb-md-1">
                    <router-link
                        to="/"
                        class="btn icon icon-shape bg-red text-white rounded-circle hitam"
                    >
                        <i
                            class="fa fa-arrow-circle-left"
                            aria-hidden="true"
                        ></i>
                    </router-link>
                    <h5 class="mb-0 mr-0 text-gray-900 px-2">Profile</h5>
                </div>
            </div>
        </div> -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h5 class="page-title">Profile User</h5>
                    <ul class="">
                        <p class="breadcrumb-item">
                            <router-link to="/">Dashboard</router-link>
                            <span>/</span>
                            <span></span>
                            <a href="">Edit Profile</a>
                        </p>
                    </ul>
                </div>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img
                            class="img-fluid coba"
                            style="width: 150px"
                            src="/img/profile.png"
                        />

                        <h5 class="my-3">nama</h5>

                        <!-- <p v-if="user.jenisKelamin == 'Laki-Laki'">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-gender-male"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"
                                />
                            </svg>
                        </p>
                        <p v-else-if="user.jenisKelamin == 'Perempuan'">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-gender-female"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"
                                />
                            </svg>
                        </p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">coba</p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">coba</p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Telephone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">coba</p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">cobs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.hitam {
    background-color: #303137 !important;
    color: #fefefe;
    border-color: #303137;
}
.hitam:hover {
    background-color: #303137 !important;
    color: #fefefe;
    border-color: #303137;
}
.coba {
    border-radius: 5%;
}
.breadcrumb {
    display: flex;
    flex-wrap: wrap;
    padding: 0.75rem 1rem;
    margin-bottom: 1rem;
    list-style: none;
    background-color: #fff;
    border-radius: 0.35rem;
}
</style>
