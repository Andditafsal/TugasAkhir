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
        path: "/suratmasuk/:id/edit",
        name: "EditSuratMasuk",
        component: () => import("../../pages/suratmasuk/Edit.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/suratmasuk/:id/views",
        name: "ViewsSuratMasuk",
        component: () => import("../../pages/suratmasuk/views.vue"),
        meta: {
            requiresAuth: true,
        },
        props: true,
    },

];
