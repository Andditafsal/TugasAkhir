import {
    createRouter,
    createWebHistory
} from "vue-router";
import routes from "./routes";
import Cookies from "js-cookie";

const router = createRouter({
    history: createWebHistory(),
    routes,
})


router.beforeEach((to, from, next) => {
    let token = Cookies.get("token");

    if (to.meta.requirestAuth) {
        if (!token) {
            window.location.href = "/auth/login"
        } else {
            next();
        }
    }
    if (!to.meta.requirestAuth) {
        if (token) {
            window.location.href = "/"
        } else {
            next();
        }
    }
    next();
});
export default router;
