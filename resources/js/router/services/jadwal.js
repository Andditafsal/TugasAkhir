export default [{
    path: "/jadwal",
    name: "Jadwal",
    component: () => import("../../pages/jadwal/Index.vue"),
    meta: {
        requiresAuth: true,
    },
}];
