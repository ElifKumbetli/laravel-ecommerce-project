import axios from "axios";
import $ from "jquery";
import feather from "feather-icons";
import "bootstrap";

window.$ = $;
window.jQuery = $;
window.axios = axios;
window.feather = feather;

// Laravel'de CSRF token ekleme
const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error("CSRF token not found!");
}

import "./panel-list-item-delete";

window.addEventListener("DOMContentLoaded", () => {
    feather.replace();
});
