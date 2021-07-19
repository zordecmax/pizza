import Vue from "vue";
import Vuex from 'vuex';
import Alert from "./components/Alert";
import CartComponent from "./components/CartComponent";
import AddToCartComponent from "./components/AddToCartComponent";
import CartListComponent from "./components/CartListComponent";
import SearchProductsComponent from "./components/SearchProductsComponent";
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import store from './store.js';

require('./bootstrap');
Vue.component('alert', Alert);
Vue.component('cart-component', CartComponent);
Vue.component('add-to-cart-component', AddToCartComponent);
Vue.component('cart-list-component', CartListComponent);
Vue.component('search-products-component', SearchProductsComponent)

// Vue.use(Vuex)
import algoliasearch from 'algoliasearch/lite';
window.algoliasearch = algoliasearch;

import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);

Vue.use(ElementUI);

const app = new Vue({
    el: '#app',
    store: store,
    data: function () {
        return {
            searchClient: algoliasearch(
                'TXM2UHVKK8',
                'fd5fd2c8130220beae37bfd6a7c74539'
            )
        }
    },
    created() {
        // let searchInput = this.$refs.getAttribute('class');
        let searchInput = document.querySelector('.ais-SearchBox-input')
        console.log(searchInput)
    }

});


