export default [{
    path: "/arsip",
    name: "Arsip",
    component: () => import("../../pages/arsip/index.vue"),
    meta: {
        requiresAuth: true,
    },
}];
