<script>
export default {
    props: ["id"],
    data() {
        return {
            user: {
                profilePicture: "",
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
        // uploadPicture(e) {
        //     console.log("uploadPicture  ");
        //     console.log(e);
        //     this.user.picture = e.target.files[0];
        //     const imageBlob = window.URL.createObjectURL(e.target.files[0]);
        //     this.previewpicture = imageBlob;
        //     console.log(this.previewpicture);
        // },
    },
};
</script>
<template>
    <div class="card shadow col-lg-6 mb-4">
        <div class="card-header">
            <div class="mb-3 col-7 d-flex align-items-center mb-md-1">
                <router-link
                    to="/user"
                    class="btn icon icon-shape bg-red text-white rounded-circle hitam"
                >
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </router-link>
                <h5 class="mb-0 mr-0 text-gray-900 px-2">Detail Pengguna</h5>
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
                                    <label for="name">Nama Lengkap *</label
                                    ><input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        v-model="user.name"
                                        disabled
                                    />
                                </div>
                                <!-- <div class="form-group">
                                    <label for="name">Id Role *</label
                                    ><input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        v-model="user.idRole"
                                        disabled
                                    />
                                </div> -->
                                <div class="form-group">
                                    <label for="email">Email *</label
                                    ><input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        v-model="user.email"
                                        disabled
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="kelamin">Jenis Kelamin *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="Hp"
                                        v-model="user.jenisKelamin"
                                        disabled
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="Hp">Nomor Telephone *</label
                                    ><input
                                        type="text"
                                        class="form-control"
                                        id="Hp"
                                        v-model="user.noHp"
                                        disabled
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat *</label
                                    ><textarea
                                        class="form-control"
                                        id="alamat"
                                        rows="3"
                                        v-model="user.alamat"
                                        disabled
                                    ></textarea>
                                </div>
                            </form>
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
.coba {
    border-radius: 5%;
}
.card-headercoba {
    border-bottom: 0px;
}
.card-headercoba {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
}
.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #ffffff;
    border-bottom: 1px solid #e3e6f0;
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
</style>
