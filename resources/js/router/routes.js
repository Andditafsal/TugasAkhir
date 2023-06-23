import user from "./services/user"

import suratmasuk from "./services/suratmasuk"
import suratkeluar from "./services/suratkeluar"
import disposisi from "./services/disposisi"
import jadwal from "./services/jadwal"
import jenissurat from "./services/jenissurat"
import arsipsurat from "./services/arsipsurat"



export default [
    ...user,
    ...arsipsurat,
    ...suratmasuk,
    ...suratkeluar,
    ...disposisi,
    ...jadwal,
    ...jenissurat,



    {
        path: "/",
        name: "Dashboard",
        component: () => import("../pages/dashboard/index.vue"),
        meta: {


        },
    },

    {
        path: "/auth/registol",
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
