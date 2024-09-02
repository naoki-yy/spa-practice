import { createRouter, createWebHistory } from "vue-router";
import axios from 'axios';
import TopView from "../views/TopView.vue";
import About from "../views/About.vue";
import Login from "../views/Login.vue";

const routes = [
    {
        path: "/",
        name: "top",
        component: TopView,
        meta: { requiresAuth: true },
    },
    {
        path: "/about",
        name: "about",
        component: About,
        meta: { requiresAuth: true },
    },
    {
        path: "/login",
        name: "login",
        component: Login,
        meta: { requiresAuth: false },
    },
];

const router = createRouter({
    history: createWebHistory("/"),
    routes,
});

router.beforeEach(async (to, from, next) => {
    if (to.meta.requiresAuth) {
        try {
            const response = await axios.get("/api/user");

            if (response.data) {
                next();
            } else {
                next("/auth/google");
            }
        } catch (error) {
            next("/auth/google");
        }
    } else {
        next(); // 認証不要なルートはそのまま進む
    }
});

export default router;
