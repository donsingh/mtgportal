import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";
import VueAxios from "vue-axios";

axios.defaults.baseURL = "http://localhost/api";


createApp(App)
    .use(router)
    .use(VueAxios, axios)
    .mount("#app");
