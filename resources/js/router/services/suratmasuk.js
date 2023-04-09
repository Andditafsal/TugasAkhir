export default [{
    path: "/suratmasuk",
    name: "SuratMasuk",
    component: () => import("../../pages/suratmasuk/index.vue"),
    meta: {
        requiresAuth: true,
    },
}];
