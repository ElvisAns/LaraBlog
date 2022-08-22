import { createRouter, createWebHistory } from "vue-router";
import LandingPage from "../components/LandingPage.vue";
import TheLoginForm from "../components/TheLoginForm.vue";
import TheSignupForm from "../components/TheSignupForm.vue";
import ThePostViewer from "../components/ThePostViewer.vue";
import TheUserProfile from "../components/TheUserProfile.vue";
import store from "@/store";

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
    {
        path: "/user/profile",
        name: "userProfile",
        component: TheUserProfile,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

// eslint-disable-next-line no-unused-vars
router.beforeEach(async (to, from) => {
    const isAuthenticated = store.state.isLoggedIn;
    if (!isAuthenticated && to.name == "userProfile") {
        return { name: "login" };
    }
    if (
        isAuthenticated &&
        (to.name == "login" || to.name == "signup") &&
        to.name !== "userProfile"
    ) {
        return { name: "userProfile" };
    }
});

export default router;
