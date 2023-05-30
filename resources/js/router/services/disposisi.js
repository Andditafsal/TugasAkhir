export default [{
        path: "/disposisi",
        name: "Disposisi",
        component: () => import("../../pages/disposisi/Index.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/disposisi/create",
        name: "Disposisi Create",
        component: () => import("../../pages/disposisi/Create.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/disposisi/edit",
        name: "Disposisi Edit",
        component: () => import("../../pages/disposisi/Edit.vue"),
        meta: {
            requiresAuth: true,
        },
    },

]
