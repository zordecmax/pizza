import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
const store = new Vuex.Store({
    state: {
        cart: [],
        cartStage: 1,
        deliveredTime: null,
        showSearchResult: false
    },
    mutations: {
        addToCart(state, payload) {
            let itemIndex = state.cart.findIndex((item) => {
                if ( item.id === payload.id) {
                    return true;
                }
            })
            console.log(payload.id)
            itemIndex === -1 ? state.cart.push(payload) : state.cart[itemIndex].qty += payload.qty;
            localStorage.setItem('cart', JSON.stringify(state.cart));
        },
        deleteAllCart(state){
            state.cart = [];
            localStorage.setItem('cart', JSON.stringify(state.cart));
        },
        removeFromCart(state, id) {
            let itemIndex = state.cart.findIndex((item) => {
                if ( item.id === id) {
                    return true;
                }
            })
        if (itemIndex !== -1) {
            state.cart.splice(itemIndex,1)
        }
            localStorage.setItem('cart', JSON.stringify(state.cart));
        },
        upItemQuantity(state, id){
            let itemIndex = state.cart.findIndex((item) => {
                if ( item.id === id) {
                    return true;
                }
            })
        if (itemIndex !== -1) {
            state.cart[itemIndex].qty++;
        }
            localStorage.setItem('cart', JSON.stringify(state.cart));
        },
        downItemQuantity(state, id){
            let itemIndex = state.cart.findIndex((item) => {
                if ( item.id === id) {
                    return true;
                }
            })
        if (itemIndex !== -1) {
            state.cart[itemIndex].qty--;
        }
            localStorage.setItem('cart', JSON.stringify(state.cart));
        },
        changeStage(state, newStage) {
            state.cartStage = newStage
        },
        changeDeliveredTime(state, newTime){
            state.deliveredTime = newTime
        },
        // changeSearchResult(state, newState){
        //     state.showSearchResult = newState
        // },
        changeSearchResult(state, newType){
            state.showSearchResult = newType
        }
    },
    getters: {
        itemsInCartCount: state => state.cart.reduce((acc, el) => acc + el.qty, 0),
        cartTotal: state => state.cart.reduce((acc, el) => acc + el.price * el.qty, 0),
        getAllItems: state => state.cart,
        getCartStage: state => state.cartStage,
        getDeliveredTime: state => state.deliveredTime,
        showSearchResult: state => state.showSearchResult
    },

})
export default store;
