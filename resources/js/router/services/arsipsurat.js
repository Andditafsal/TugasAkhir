export default [{
        path: "/arsipsurat",
        name: "Arsip",
        component: () => import("../../pages/arsip/index.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/arsipsurat/create",
        name: "Create Arsip",
        component: () => import("../../pages/arsip/Create.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/arsipsurat/edit",
        name: "Edit Arsip",
        component: () => import("../../pages/arsip/Edit.vue"),
        meta: {
            requiresAuth: true,
        },
    },
];
