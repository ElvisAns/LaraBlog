import { createRouter, createWebHistory } from "vue-router";
import LandingPage from "../components/LandingPage.vue";
import TheLoginForm from "../components/TheLoginForm.vue";
import TheSignupForm from "../components/TheSignupForm.vue";
import ThePostViewer from "../components/ThePostViewer.vue";
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
    {
        path: "/posts/read/:slug",
        name: "readpost",
        component: ThePostViewer,
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
