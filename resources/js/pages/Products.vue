<template>
  <div class="container-fluid">
     <div class="row">
         <div class="col-2" v-for="(product, index) in products" :key='`product-${index}`'>
            <div class='card-container mb-5'>
                <Card />
            </div>
         </div>
     </div>
  </div>
</template>

<script>
import axios from "axios"
import Card from "../components/Card"
export default {
    name: 'products',
    components: {
        Card,
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
                console.log(response.data)
                this.products = response.data;
            })
        }
    },
    created(){
        this.getProducts();
    }
}
</script>

<style>

</style>