<template>
    <!-- Start sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <!-- Start Menu Dashboard -->
                    <li class="submenu">
                        <router-link :to="{ name: 'Dashboard' }"
                            ><i class="la la-dashboard"></i>
                            <span> Dashboard</span>
                        </router-link>
                    </li>
                    <!-- End Menu Dashboard -->
                    <li class="menu-title">
                        <span>Settings</span>
                    </li>
                    <!-- Start Menu User -->
                    <li>
                        <router-link :to="{ name: 'User' }"
                            ><i class="la la-user-plus"></i>
                            <span>User</span>
                        </router-link>
                    </li>
                    <!-- End Menu User -->
                    <li class="menu-title">
                        <span>Data Surat</span>
                    </li>
                    <!-- Start Surat -->
                    <li class="submenu">
                        <a href="#"
                            ><i class="la la-file-text"></i>
                            <span> Surat </span>
                            <span class="menu-arrow"></span
                        ></a>
                        <ul style="display: none">
                            <li>
                                <a href="estimates.html">Surat Masuk</a>
                            </li>
                            <li>
                                <a href="invoices.html">Surat Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <!-- End Surat -->
                    <!-- Start Arsip -->
                    <li>
                        <a href="assets.html"
                            ><i class="la la-object-ungroup"></i>
                            <span>Arsip Surat</span></a
                        >
                    </li>
                    <!-- End Arsip -->
                </ul>
            </div>
        </div>
    </div>
    <!-- End sidebar -->
</template>
