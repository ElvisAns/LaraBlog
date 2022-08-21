import { createRouter, createWebHistory } from "vue-router";
import LandingPage from "../components/LandingPage.vue";
import TheLoginForm from "../components/TheLoginForm.vue";
import TheSignupForm from "../components/TheSignupForm.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: LandingPage,
    },
    {
        path: "/auth/login",
        name: "login",
        component: TheLoginForm,
    },
    {
        path: "/auth/signup",
        name: "signup",
        component: TheSignupForm,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
