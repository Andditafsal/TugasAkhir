export default [{
        path: "/jenissurat",
        name: "JenisSurat",
        component: () => import("../../pages/jenissurat/Index.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/jenissurat/create",
        name: "Create Jenis",
        component: () => import("../../pages/jenissurat/Create.vue"),
        meta: {
            requiresAuth: true,
        },
        props: true,
    },

    {
        path: "/jenissurat/:id/edit",
        name: "Edit Jenis",
        props: true,
        component: () => import("../../pages/jenissurat/Edit.vue"),
        meta: {
            requiresAuth: true,
        },
        props: true,
    },
]