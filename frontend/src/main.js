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

createApp(App)
    .use(store)
    .use(router)
    .use(VueAxios, axios)
    .use(VueLoading)
    .mount("#app");
