<template>

    <div>

            <button v-if="clicked === true" @click="addToCart" class="btn  btn-danger">
                <span class="text">Added to cart</span>
                <i class="fas fa-shopping-cart"></i>
            </button>



            <button v-if="clicked === false" @click="addToCart" class="btn  btn-outline-danger">
                <span class="text">Add to cart</span>
                <i class="fas fa-shopping-cart"></i>
            </button>

    </div>

</template>

<script>
export default {
    name: "AddToCartComponent",
    props: {
        id: {
            required: true,
        },
        price: {
            required: true,
        },
        name: {
            required: true,
            type: String
        },
        image: {
            required: true,
            type: String
        }

    },
    data() {
        return {
            clicked: false
        }
    },
    methods: {
        addToCart() {
            this.$store.commit('addToCart', {'id' : this.id, 'qty': 1, 'price': this.price, 'name': this.name, 'image': this.image})
            if(!this.clicked) {
                this.changeButton();
            }
            if(this.clicked){
                setTimeout(this.changeButton, 1000);
            }

        },
        changeButton() {
            this.clicked = !this.clicked;
        }
    }

}
</script>

<style scoped>
    button {
        width: 115px;
    }

</style>
