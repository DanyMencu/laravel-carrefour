<template>
  <div class="products pt-3">
    <div class="container-fluid">
        <div v-if="products" class="row">
            <div class="col-2" v-for="(product, index) in products" :key='`product-${index}`'>
                <div class='card-container mb-5'>
                    <Card :product="product"/>
                </div>
            </div>
        </div>
        <Loader v-else/>
    </div>
  </div>
</template>

<script>
import axios from "axios"
import Card from "../components/Card"
import Loader from "../components/Loader";

export default {
    name: 'products',
    components: {
        Card,
        Loader,
    },
    data(){
        return({
            products: null,
        })
    },

    methods: {
        getProducts(){
            axios.get('http://127.0.0.1:8000/api/products')
            .then(response => {
                this.products = response.data;
            })
        }
    },
    created(){
        this.getProducts();
    }
}
</script>

<style lang="scss" scoped>
    .products {
        min-height: 100vh;
        background-color: #f7f7f7;
    }
</style>