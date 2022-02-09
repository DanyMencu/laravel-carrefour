<template>
    <div class="container">
        <div class="box mb-4" v-for="product in products" :key="'product-${product.id}'">
            <h1>{{product.name}}</h1>
            <p>{{product.description}}</p>
            <p>€ {{product.price}}</p>
            <div class="cart">
                <div class="btn">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "App",
    component: {},
    data() {
        return {
            products : null,
        }
    },
    created() {
       this.getProducts();
    },
    methods : {
        getProducts() {
            const axios = require('axios');

            // Make a request for a user with a given ID
            axios.get('http://127.0.0.1:8005/api/products')
            .then(response => {
                // handle success
                this.products = response.data;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });

        }
    }
}
</script>

<style lang="scss">
.container {
    max-width: 1100px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}
    .box {
        width: calc(100% / 2);
    }
</style>