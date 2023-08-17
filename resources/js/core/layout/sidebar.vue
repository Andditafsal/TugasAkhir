<script></script>
<template>
    <ul
        class="navbar-nav bg-side sidebar sidebar-dark accordion"
        id="accordionSidebar"
    >
        <!-- Sidebar - Brand -->

        <a
            class="sidebar-brand d-flex align-items-center justify-content-center"
            href="index.html"
        >
            <div class="sidebar-brand-text mx-3">PERSURATAN</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->

        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'Dashboard' }">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></router-link
            >
        </li>

        <!-- <li class="nav-item">
            <router-link :to="{ name: 'Jadwal' }" class="nav-link">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span>Jadwal</span></router-link
            >
        </li> -->

        <!-- Divider -->
        <!-- <hr class="sidebar-divider" /> -->

        <!-- Heading -->

        <!-- Nav Item - Pages Collapse Menu -->

        <!-- Divider -->
        <hr class="sidebar-divider" />
        <li class="nav-item">
            <router-link
                :to="{ name: 'JenisSurat' }"
                class="nav-link"
                v-if="$can('action', 'Petugas')"
            >
                <i class="fa fa-list" aria-hidden="true"></i>
                <span>Jenis Surat</span>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'SuratMasuk' }">
                <i class="fas fa-envelope fa-2x text-gray-300"></i>
                <span>Surat Masuk</span></router-link
            >
        </li>
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'SuratKeluar' }">
                <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                <span>Surat Keluar</span></router-link
            >
        </li>

        <!-- <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'Arsip' }">
                <i class="fas fa-archive"></i>
                <span>Arsip Surat</span></router-link
            >
        </li> -->

        <hr class="sidebar-divider" />
        <li class="nav-item">
            <router-link
                class="nav-link"
                :to="{ name: 'User' }"
                v-if="$can('action', 'Admin')"
            >
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>User</span></router-link
            >
        </li>
    </ul>
</template>

<style>
.bg-side {
    background-color: #303137;
}
.fa-book {
    background-color: black;
    color: black;
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #303137;

    border-color: #303137;
}
</style>
