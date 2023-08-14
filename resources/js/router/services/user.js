import {
    checkRoles,
    roles
} from "../../Middleware/protect";
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
        path: "/user/:id/views",
        name: "Views User",
        component: () => import("../../pages/user/Views.vue"),
        meta: {
            middleware: checkRoles(roles.admin)
        },
        props: true,
    },
    {
        path: "/user/create",
        name: "Create User",
        component: () => import("../../pages/user/Create.vue"),
        meta: {
            middleware: checkRoles(roles.admin)
        },
        props: true,
    },

    {
        path: "/user/:id/edit",
        name: "Edit User",
        props: true,
        component: () => import("../../pages/user/Edit.vue"),
        meta: {
            requiresAuth: true,
            middleware: checkRoles(roles.admin)
        },
        props: true,
    },

];
