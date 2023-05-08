<script>
export default {
    props: ["id"],
    data() {
        return {
            user: {
                picture: "",
            },
            privewpicture: "",
        };
    },
    mounted() {
        this.getUser();
    },
    methods: {
        getUser() {
            this.$store
                .dispatch("showData", ["user", this.id])
                .then((response) => {
                    this.user = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        uploadPicture(e) {
            console.log("uploadPicture  ");
            console.log(e);
            this.user.picture = e.target.files[0];
            const imageBlob = window.URL.createObjectURL(e.target.files[0]);
            this.previewpicture = imageBlob;
            console.log(this.previewpicture);
        },
    },
};
</script>
<template>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-lg-6 mb-4">
            <div class="">
                <div class="mb-3 col-7 d-flex align-items-center mb-md-1">
                    <router-link
                        to="/user"
                        class="btn icon icon-shape bg-red text-white rounded-circle"
                    >
                        <i
                            class="fa fa-arrow-circle-left"
                            aria-hidden="true"
                        ></i>
                    </router-link>
                    <h5 class="mb-0 mr-0 text-gray-900 px-2">Profile User</h5>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img
                            :src="user.profilePicture"
                            alt="avatar"
                            class="rounded-circle img-fluid"
                            style="width: 300px"
                        />
                        <h5 class="my-3">{{ user.name }}</h5>

                        <p v-if="user.jenisKelamin == 'Laki-Laki'">
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
                        </p>
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
                                <p class="text-muted mb-0">{{ user.name }}</p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ user.email }}</p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Telephone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ user.noHp }}</p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ user.alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.profile-view {
    position: relative;
}
.profile-view .profile-img-wrap {
    height: 120px;
    width: 120px;
}

.profile-img-wrap {
    height: 120px;
    position: absolute;
    width: 120px;
    background: 0 0;
    overflow: hidden;
}
.profile-view .profile-img {
    width: 120px;
    height: 120px;
}

.profile-img {
    cursor: pointer;
    height: 80px;
    margin: 0 auto;
    position: relative;
    width: 80px;
}
.profile-view .profile-basic {
    margin-left: 140px;
    padding-right: 50px;
}
.profile-info-left {
    border-right: 2px dashed #a41c1c;
}
.personal-info {
    list-style: none;
    margin-bottom: 0;
    padding: 0;
}
.personal-info li .text {
    color: #bbc4cc;
    display: block;
    overflow: hidden;
}
</style>
