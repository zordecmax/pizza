<template>
    <div class="cart">
        <div  v-if="cartStage === 1" class="cart__products">
            <h1 v-if="!cartCount">No products in cart</h1>
            <div v-if="cartCount"  class="cart-items">
                <div v-for="item in cartItems" :key="item.id" class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-lg-2"><img :src="item.image" class="img-fluid"></div>
                        <div class="col-lg-3">
                            <div class="row">{{ item.name }}</div>
                        </div>
                        <div class="col-lg-3">
                            <button  @click.prevent="downItemQuantity(item.id)" class="btn">
                                <i class="bi bi-dash-circle-fill"></i>
                            </button>
                            <input min="1" name="qty" :value="item.qty" type="number" class="quantity" style="width: 30px;">
                            <button  @click.prevent="upItemQuantity(item.id)" class="btn">
                                <i class="bi bi-plus-circle-fill"></i>
                            </button>
                        </div>
                        <div class="col-lg-2">
                            {{ item.price }} Mdl
                        </div>
                        <div class="col-lg-2">
                            <div>
                            <span>
                                      {{ item.price * item.qty }} Mdl
                           </span>
                                <button @click.prevent="removeFromCart(item.id)"  class="btn">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12 text-right total">
                    <strong>Total: {{ cartTotal }} Mdl </strong>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <a href="/menu"  class="btn btn-dark">
                        Continue shopping
                    </a>
                    <button  @click.prevent="changeCartStage(2)" class="btn btn-danger">
                        Confirm order
                    </button>
                </div>
            </div>
        </div>
        <transition
            name="contact-details"
            enter-active-class="animate__animated animate__slideInRight"
        >
        <div v-if="cartStage === 2" class="cart__contact">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name">Your name:</label>
                    <input v-model="authUser.name" type="text" class="form-control" id="name">
                </div>
                <div class="form-group col-md-4">
                    <label for="phone">Cell phone:</label>
                    <input v-model="authUser.phone" type="text" class="form-control" id="phone">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Your email:</label>
                    <input v-model="authUser.email" type="email" class="form-control" id="email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
<!--                    <label for="time">Delivery time:</label>-->
<!--                    <input type="datetime-local" v-model="deliveredTime" v-bind:min="minDate" v-bind:max="maxDate" class="form-control" id="time">-->
                    <el-time-select
                        v-model="deliveredTime"
                        :picker-options="{
                            start: this.minDate,
                            end: '20:00'
                          }"
                        placeholder="Select time">
                    </el-time-select>
                </div>
                <div class="form-group col-md-4">
                    <label for="address">Delivery address:</label>
                    <input v-model="authUser.address" type="text" class="form-control" id="address">
                </div>
                <div class="form-group col-md-4">
                    <label for="comment">Your comment:</label>
                    <input v-model="comment" type="text" class="form-control" id="comment">
                </div>
            </div>
<!--            <div class="form-group">-->

<!--                <label for="shipping">SHIPPING:</label>-->
<!--                <select class="form-control" id="shipping">-->
<!--                    <option>Take away from restaurant</option>-->
<!--                    <option>Standard-Delivery- 50 Mdl</option>-->
<!--                </select>-->
<!--                </div>-->
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <a href="/menu"  class="btn btn-dark">
                        Continue shopping
                    </a>
                    <button  @click.prevent="changeCartStage(3)" class="btn btn-danger">
                        Confirm order
                    </button>
                </div>
            </div>
        </div>
        </transition>
        <transition
            name="payment-details"
            enter-active-class="animate__animated animate__slideInRight"
        >
        <div  v-if="cartStage === 3" class="cart__payment">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cardName">Name on card:</label>
                    <input type="text" class="form-control" id="cardName" placeholder="John Doe">
                </div>
                <div class="form-group col-md-6">
                    <label for="cardNumber">Credit card number:</label>
                    <input type="text" class="form-control" id="cardNumber" placeholder="1111-222-3333-4444">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="expMont">Exp Mont</label>
                    <input type="text" class="form-control" id="expMont" placeholder="September">
                </div>
                <div class="form-group col-4">
                    <label for="expYear">Exp Year</label>
                    <input type="text" class="form-control" id="expYear" placeholder="2022">
                </div>
                <div class="form-group col-4">
                    <label for="cvc">CVC</label>
                    <input type="text" class="form-control" id="cvc" placeholder="352">
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <a href="/menu"  class="btn btn-dark">
                        Continue shopping
                    </a>
                    <button  @click.prevent="confirmOrder()" class="btn btn-danger">
                        Continue to checkout
                    </button>
                </div>
            </div>
        </div>
        </transition>
        <transition
            name="success"
            enter-active-class="animate__animated animate__slideInRight"
        >
            <div  v-if="cartStage === 4" class="cart__success">
                <div class="row">
                    <div class="col-12 text-center">
                        <p><i class="bi bi-check-lg" style="font-size: 3rem; color: red"></i></p>
                        <h1>Thank you for purchase</h1>
                        <p>In short time we will contact you</p>
                    </div>
                </div>
            </div>
        </transition>

    </div>
</template>

<script>
export default {
    name: "CartListComponent",
    props: ['userData'],
    data(){
        return {
            name: 'Max',
            newClient: {
                name: '',
                email: '',
                phone: '',
                address: '',
                token: null
            },
            comment: ''

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
        },
        cartStage() {
            return this.$store.getters.getCartStage
        },
        authUser() {
            return (this.userData) ? JSON.parse(this.userData) : this.newClient;
        },
        minDate() {
            let today = new Date();
            // let date = today.toISOString().split('.')[0];
            // let month = today.getMonth() < 10 ? '0' + (today.getMonth() + 1) : today.getMonth() + 1;
            // let date = today.getFullYear()+'-'+month+'-'+today.getDate()+'T'+today.getHours() + ":" + today.getMinutes();
            let hours = today.getHours() < 10 ? '0' + today.getHours()  : today.getHours();
            let minutes = today.getMinutes() < 10 ? '0' + today.getMinutes()  : today.getMinutes();
            let date = hours + ":" + minutes;
            return date;
        },
        maxDate() {
            let today = new Date();
            let month = today.getMonth() < 10 ? '0' + (today.getMonth() + 1) : today.getMonth() + 1;
            let date = today.getFullYear()+'-'+ month +'-'+today.getDate()+'T'+ 20 + ":" + '00';
            return date


        },
        deliveredTime: {
            get: function (){
              return  this.$store.getters.getDeliveredTime
            },
            set: function (value){
                this.$store.commit('changeDeliveredTime', value)
            }
        }

    },
    mounted() {
        console.log(this.minDate)
    },
    methods: {
        deleteCart() {
            this.$store.commit('deleteAllCart')
        },
        removeFromCart(id) {
            this.$store.commit('removeFromCart', id)
        },
        upItemQuantity(id) {
            this.$store.commit('upItemQuantity', id)
        },
        downItemQuantity(id) {
            this.$store.commit('downItemQuantity', id)
        },
        changeCartStage(newStage) {
            this.$store.commit('changeStage', newStage)

        },
        confirmOrder(){
            this.$store.commit('changeStage', 4)
            axios.post('/api/order',
            {
                    delivered: this.deliveredTime,
                    bill2: this.cartTotal,
                    token: this.authUser.token,
                    items: this.cartItems,
                    name: this.authUser.name,
                    email: this.authUser.email,
                    phone: this.authUser.phone,
                    address: this.authUser.address,
                    comment: this.comment,
            }, {withCredentials: true})
            .then(function (response) {
                console.log(response);
            })
            this.$store.commit('deleteAllCart')

        }
    }
}
</script>

<style scoped>
.bi{
    font-size: 1.5rem;
    color: red;
    }
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}

.total {
    padding-right: 45px;
}
</style>
