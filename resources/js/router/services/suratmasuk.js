export default [{
        path: "/suratmasuk",
        name: "SuratMasuk",
        component: () => import("../../pages/suratmasuk/Index.vue"),
        meta: {
            requiresAuth: true,
        },
    },

    {
        path: "/suratmasuk/create",
        name: "SuratMasukCreate",
        component: () => import("../../pages/suratmasuk/Create.vue"),
        meta: {
            requiresAuth: true,
        },
    },

    {
        path: "/suratmasuk/edit",
        name: "Edit Surat",
        component: () => import("../../pages/suratmasuk/Edit.vue"),
        meta: {
            requiresAuth: true,
        },
    },

];
