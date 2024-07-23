require('./bootstrap');

import Vue from 'vue';
import ElementUI from 'element-ui';

import {store} from './store/store.js'

import 'element-ui/lib/theme-chalk/index.css';

window.Vue = require('vue').default;

Vue.use(ElementUI);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('student-form-component', require('./components/student/StudentFormComponent.vue').default);

const app = new Vue({
    store,
    el: '#vue-app',
});
