
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('./icons');

/**
 *  多言語設定
 */

import Lang from 'lang.js';
const default_locale = window.default_language;
const fallback_locale = window.fallback_locale;
const messages = window.messages;
Vue.prototype.trans = new Lang({ messages, locale: default_locale, fallback: fallback_locale });

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./vue/components', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        sidebar: false,
        sidebarActive: ''
    },
    methods: {
        hideLoader: function () {
            this.$refs.loader.hide();
        },
        showLoader: function () {
            this.$refs.loader.show();
        },
        hideIndicator: function () {
            this.$refs.indicator.hide();
        },
        showIndicator: function (message) {
            this.$refs.indicator.show(message);
        },
        menuButtonHasClicked: function () {
            this.sidebar = !this.sidebar;
        },
        fullScreen: function () {
            if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) ||
                (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) ||
                (document.mozFullScreen !== undefined && !document.mozFullScreen) ||
                (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
                if (document.documentElement.requestFullScreen) {
                    document.documentElement.requestFullScreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullScreen) {
                    document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                } else if (document.documentElement.msRequestFullscreen) {
                    document.documentElement.msRequestFullscreen();
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
        },
        selectedSidebarItem: function (item) {
            this.sidebar = false;
            this.sidebarActive = item;
        }
    },
    computed: {
        hasSidebar: function() {
            return $('#sidebar').data('sidebar') ? true : false;
        }
    }
});
