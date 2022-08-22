import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "bootstrap";
import "bootstrap-icons/font/bootstrap-icons.css";
import "bootstrap/dist/css/bootstrap.min.css";
import "animate.css";
import axios from "axios";
import VueAxios from "vue-axios";
import VueLoading from "vue-loading-overlay";
import Toast from "vue-toastification";
import VueCookies from "vue-cookies";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";
axios.defaults.withCredentials = false;
createApp(App)
    .use(store)
    .use(router)
    .use(VueAxios, axios)
    .use(VueLoading)
    .use(Toast)
    .use(VueCookies)
    .mount("#app");
