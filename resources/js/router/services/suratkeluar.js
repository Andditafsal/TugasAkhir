export default [{
    path: "/suratkeluar",
    name: "SuratKeluar",
    component: () => import("../../pages/suratkeluar/index.vue"),
    meta: {
        requiresAuth: true,
    },
}];
