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
import Toast, { PluginOptions } from "vue-toastification";
import VueGoodTablePlugin from "vue-good-table";
import "vue-good-table/dist/vue-good-table.css";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

createApp(App)
    .use(store)
    .use(router)
    .use(VueAxios, axios)
    .use(VueLoading)
    .use(Toast, PluginOptions)
    .use(VueGoodTablePlugin)
    .mount("#app");
