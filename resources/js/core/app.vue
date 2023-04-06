<script>
import Sidebar from "./layout/sidebar.vue";
import Headers from "./layout/header.vue";

export default {
    components: {
        Sidebar,
        Headers,
    },
};
</script>
<template>
    <body>
        <div class="main-wrapper">
            <!-- Start header -->
            <headers />
            <!-- End header -->
            <!-- Start sidebar -->
            <sidebar />
            <!-- End sidebar -->
            <!-- Start Component -->
            <router-view></router-view>
            <!-- end Component -->
        </div>
    </body>
</template>
