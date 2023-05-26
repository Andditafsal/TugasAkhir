export default [{
        path: "/suratkeluar",
        name: "SuratKeluar",
        component: () => import("../../pages/suratkeluar/index.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/suratkeluar/create",
        name: "SuratKeluarCreate",
        component: () => import("../../pages/suratkeluar/Create.vue"),
        meta: {
            requiresAuth: true,
        },
    },
    {
        path: "/cetak_surat/:id",

        name: "CetakSuratKeluar",
        component: () => import("../../pages/template/surat_audit.vue"),
        meta: {
            requiresAuth: true
        }
    }
];
