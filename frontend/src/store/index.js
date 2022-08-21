import { createStore } from "vuex";

export default createStore({
    state: {
        user: {},
        isLoggedIn: false,
    },
    getters: {},
    mutations: {
        makeLogin(state, userData) {
            state.isLoggedIn = true;
            state.user = userData;
        },
        makeLogout(state) {
            state.isLoggedIn = false;
            state.user = {};
        },
    },
    actions: {},
    modules: {},
});
