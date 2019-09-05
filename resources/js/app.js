require('./bootstrap');

// Bring in Vue
window.Vue = require('vue');

// Register Vue Components
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('store-card', require('./components/StoreCard.vue').default);

// Initialise Vue on the page.
const app = new Vue({
    el: '#app',
});
