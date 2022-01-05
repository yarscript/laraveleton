/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from "jquery";
import './bootstrap';

window.jQuery = window.$ = $;

import Vue from "vue";
import VeeValidate, { Validator } from 'vee-validate';
import ar from "vee-validate/dist/locale/ar";
import de from "vee-validate/dist/locale/de";
import Vue2Dropzone from "vue2-dropzone"

window.Vue = Vue;
window.VeeValidate = VeeValidate;

Vue.use(VeeValidate, {
    dictionary: {
        ar: ar,
        de: de,
    },
    events: 'input|change|blur',
    inject: 'true', fieldsBagName: 'veeFields'

});

Vue.prototype.$http = axios

window.eventBus = new Vue();

import { BootstrapVue } from "bootstrap-vue";
import vClickOutside from "v-click-outside";
import VueMask from "v-mask";
import VueApexCharts from "vue-apexcharts";
import * as VueGoogleMaps from "vue2-google-maps";
import { Multiselect } from "vue-multiselect";
import VueSweetalert2 from "vue-sweetalert2";
import i18n from "./i18n";


Vue.prototype.$isDev = process.env.MIX_APP_ENV !== "production";
Vue.config.devtools = Vue.prototype.$isDev;
Vue.config.debug = Vue.prototype.$isDev;
Vue.config.silent = !Vue.prototype.$isDev;
// import tinymce from "vue-tinymce-editor";

Vue.use(BootstrapVue);
Vue.use(vClickOutside);
Vue.use(VueMask);
Vue.use(Vue2Dropzone)
// Vue.use(require("vue-chartist"));
Vue.use(VueSweetalert2);
// Vue.use(VueGoogleMaps, {
//     load: {
//         key: "AIzaSyAbvyBxmMbFhrzP9Z8moyYr6dCr-pzjhBE",
//         libraries: "places"
//     },
//     installComponents: true
// });
// Vue.component("apexchart", VueApexCharts);
// Vue.component("tinymce", tinymce);
Vue.component('Multiselect', Multiselect);
Vue.component('Dropzone', Vue2Dropzone);



Vue.component(
    "dynamic-component",
    require("./components/dynamic-component").default
);

Vue.component('NavBar', require('./components/nav-bar').default);
Vue.component('SideBar', require('./components/side-bar').default);
Vue.component('Footer', require('./components/footer').default);
// Vue.component('RightBar', require('./components/right-bar').default);
Vue.component('PageHeader', require('./components/page-header').default);
Vue.component('VerticleTab', require('./components/verticle-tab').default);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import "./views";

$(document).ready(function () {
    Vue.config.ignoredElements = [
        'option-wrapper',
        'group-form',
        'group-list'
    ];

    var app = new Vue({
        el: "#app",
        i18n,

        data: {
            modalIds: {}
        },

        mounted() {
            // this.addServerErrors();
            // this.addFlashMessages();

            // this.$validator.localize(document.documentElement.lang);
        },

        methods: {
            onSubmit: function (e) {
                this.toggleButtonDisable(true);

                if (typeof tinyMCE !== 'undefined')
                    tinyMCE.triggerSave();

                this.$validator.validateAll().then(result => {
                    if (result) {
                        e.target.submit();
                    } else {
                        this.toggleButtonDisable(false);

                        eventBus.$emit('onFormError')
                    }
                });
            },

            toggleButtonDisable(value) {
                var buttons = document.getElementsByTagName("button");

                for (var i = 0; i < buttons.length; i++) {
                    buttons[ i ].disabled = value;
                }
            },

            addServerErrors(scope = null) {
                for (var key in serverErrors) {
                    var inputNames = [];
                    key.split('.').forEach(function (chunk, index) {
                        if (index) {
                            inputNames.push('[' + chunk + ']')
                        } else {
                            inputNames.push(chunk)
                        }
                    })

                    var inputName = inputNames.join('');

                    const field = this.$validator.fields.find({
                        name: inputName,
                        scope: scope
                    });
                    if (field) {
                        this.$validator.errors.add({
                            id: field.id,
                            field: inputName,
                            msg: serverErrors[ key ][ 0 ],
                            scope: scope
                        });
                    }
                }
            },
            responsiveHeader: function () {
            },
            addFlashMessages() {
                if (typeof flashMessages == 'undefined') {
                    return;
                }
                ;

                const flashes = this.$refs.flashes;

                flashMessages.forEach(function (flash) {
                    flashes.addFlash(flash);
                }, this);
            },

            showModal(id) {
                this.$set(this.modalIds, id, true);
            }
        }
    });
});
