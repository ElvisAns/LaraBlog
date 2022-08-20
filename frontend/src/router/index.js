import { createRouter, createWebHistory } from "vue-router";
import LandingPage from "../components/LandingPage.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: LandingPage,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
