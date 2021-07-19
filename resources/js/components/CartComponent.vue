<template>
<div class="cart">

    <div @mouseover="showCart()" class="bg-danger px-1 cart__block">
        <i class="bi-cart4" style="font-size: 1.3rem; color: white;"></i>
        <span class="badge badge-light">{{ cartCount }} </span>
<!--        <span class="badge badge-light">{{ cartTotal }} Mdl</span>-->
    </div>
<!--    <transition name="slide-fade">-->
    <transition
        name="custom-classes-transition"
        enter-active-class="animate__animated animate__fadeInDown"
        leave-active-class="animate__animated animate__fadeOutUp"
    >
        <div v-if="hover" aria-live="assertive" aria-atomic="true" class="toast hover-cart" data-autohide="false">
        <div class="toast-header">
            <img src="" class="rounded mr-2" alt="">
            <strong class="mr-auto">In cart</strong>
            <small></small>
            <button @click.prevent="hideCart" type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span  aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body text-right">
            <ul>
                <li v-for="item in cartItems" :key="item.id">

                    {{ item.name }} x {{ item.qty }} = {{ item.qty * item.price  }}mdl <i @click.prevent="removeFromCart(item.id)" class="bi bi-trash-fill"></i>
                </li>
            </ul>
            <div class="text-right"><strong>Total {{ cartTotal }} Mdl</strong></div>
        </div>
        <div class="toast-footer d-flex justify-content-between">
            <a href="/cart" class="btn btn-danger"  >Confirm order</a>
            <button class="btn btn-dark" @click.prevent="deleteAllCart" >Empty cart</button>
        </div>
    </div>
    </transition>
</div>

</template>

<script>
export default {
    name: "CartComponent",
    props: {
        position: {
            type: String
        }
    },
    data() {
        return {
            hover: false,
        }
    },
    computed: {
        cartCount() {
          return   this.$store.getters.itemsInCartCount
        },
        cartTotal() {
          return   this.$store.getters.cartTotal
        },
        cartItems() {
            return this.$store.getters.getAllItems
        }
    },
    methods:{
        deleteAllCart() {
            this.$store.commit('deleteAllCart')
            this.hideCart()
        },
        removeFromCart(id) {
            this.$store.commit('removeFromCart', id)
            if(this.hover && !this.cartCount){ this.hideCart()}
        },
        hideCart() {
            this.hover = false
        },
        showCart() {
            if(this.cartCount > 0){
                this.hover = true
            }
        },
        getCartCount(){
            let localCart = localStorage.getItem('cart');
            if (localCart) {
                localCart = JSON.parse(localCart);
            }
            console.log('localcart')
            return localCart ? localCart.length : 0
        }
    },
    mounted() {
        let localCart = localStorage.getItem('cart');
        if (localCart) {
            this.$store.state.cart = JSON.parse(localCart);
        }
    }
}
</script>

<style scoped>
    .bi-cart{
        font-size: 1.5rem;
    }

    .cart{
        position: relative;
    }
    .hover-cart{
        position: absolute;
        width: max-content;
        opacity: 1;
        z-index: 555;
        right: 0;
    }
    .toast-body ul{
        list-style-type: none;
    }
    .cart__block{
        border-radius: 5px;
    }

    .toast-body ul li {
        color: red;
    }
</style>
