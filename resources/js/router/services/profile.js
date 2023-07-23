export default [{
        path: "/profile",
        name: "Profile",
        component: () => import("../../pages/profile/profile.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    //    {
    //         path: "/profile/:id/edit",
    //         name: "Profile Create",
    //         component: () => import("../../pages/profile/ProfileEdit.vue"),
    //         meta: {
    //             requiresAuth: true,
    //         },
    //     }
]
