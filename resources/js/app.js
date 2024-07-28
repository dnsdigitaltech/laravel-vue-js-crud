require('./bootstrap');

import Vue from 'vue';
import ElementUI from 'element-ui';

import lang from 'element-ui/lib/locale/lang/pt'
import locale from 'element-ui/lib/locale'
locale.use(lang)

import {store} from './store/store.js'

import 'element-ui/lib/theme-chalk/index.css';

window.Vue = require('vue').default;

Vue.use(ElementUI);

Vue.component('qr-code-index', require('./components/qrCodeIndex.vue').default);
Vue.component('student-form-component', require('./components/student/StudentFormComponent.vue').default);
Vue.component('student-table-component', require('./components/student/StudentTableComponent.vue').default);

const app = new Vue({
    store,
    el: '#vue-app',
});
