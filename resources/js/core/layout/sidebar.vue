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

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'User' }">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>User</span></router-link
            >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <router-link
                class="nav-link"
                :to="{}"
                data-toggle="collapse"
                data-target="#collapsePages"
                aria-expanded="true"
                aria-controls="collapsePages"
            >
                <i class="fa fa-book" aria-hidden="true"></i>
                <span>Surat</span>
            </router-link>
            <div
                id="collapsePages"
                class="collapse show"
                aria-labelledby="headingPages"
                data-parent="#accordionSidebar"
            >
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item">Surat Masuk</a>
                    <a class="collapse-item">Surat Keluar</a>
                </div>
            </div>
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
</style>
