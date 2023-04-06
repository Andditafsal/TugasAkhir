import user from "./services/user"

export default [
    ...user,
    {
        path: "/",
        name: "Dashboard",
        component: () => import("../pages/dashboard/index.vue"),
        meta: {
            requiresAuth: true,
        },
    },

    {
        path: "/auth/register",
        name: "Register",
        component: () => import("../pages/auth/register.vue"),
        meta: {
            requiresAuth: false,
        },
    },

    {
        path: "/auth/login",
        name: "Login",
        component: () => import("../pages/auth/login.vue"),
        meta: {
            requiresAuth: false,
        },
    },

    // {

    //     path: "/admin/dashboard",
    //     name: "admin",
    //     component: () => import("../pages/dashboard/admin/coba.vue"),
    //     meta: {
    //         requiresadmin: false,
    //     },

    // },
    // {

    //     path: "/petugas/dashboard",
    //     name: "petugas",
    //     component: () => import("../pages/dashboard/petugas/coba.vue"),
    //     meta: {
    //         requirespetugas: false,
    //     },
    // },
]
