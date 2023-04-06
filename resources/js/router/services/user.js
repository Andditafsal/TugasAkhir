export default [

    {
        path: "/user",
        name: "User",
        component: () => import("../../pages/user/index.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/user/create",
        name: "Create User",
        component: () => import("../../pages/user/Create.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/user/delet",
        name: "Delet User",
        component: () => import("../../pages/user/Delet.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/user/:id/edit",
        name: "Edit User",
        component: () => import("../../pages/user/Edit.vue"),
        meta: {
            requiresAuth: true,
        },
    },

];
