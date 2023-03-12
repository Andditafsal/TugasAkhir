export default[
//     {
//         path:"/",
//         name: "Dashboard",
//         component: () => import("../"),
//         meta:{

//         },
//    }

{
    path:"/auth/register",
    name: "Register",
    component: () => import("../pages/auth/register.vue"),
    meta:{
        requiresAuth: false,
    },
}
]
