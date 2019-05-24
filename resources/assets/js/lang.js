/**
 *  多言語設定
 */

import Lang from 'lang.js';
const default_locale = window.default_language;
const fallback_locale = window.fallback_locale;
const messages = window.messages;
Vue.prototype.trans = new Lang({ messages, locale: default_locale, fallback: fallback_locale });