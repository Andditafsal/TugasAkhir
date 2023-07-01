import {
    createRouter,
    createWebHistory
} from "vue-router";
import routes from "./routes";
import Cookies from "js-cookie";

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes,
})


router.beforeEach((to, from, next) => {
    const token = Cookies.get("token");
    if (to.path !== '/auth/login' && !token) {
        next()
    } else if (to.path === "/auth/login" && token) {
        to.name = "Dashboard";
    } else {
        const middleware = to.meta.middleware;
        if (middleware) {
            middleware(to, from, next);
        } else {
            next();
        }
    }
});
export default router;
