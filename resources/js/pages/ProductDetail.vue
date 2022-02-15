<template>
    <div class="container">
        <div v-if="product">
            <div class="col-6 col-md-6">
                <h1>{{ product.name }}</h1>
                <h3>Categoria:</h3>
                <h4>Types:</h4>
                <h4>Allergeni:</h4>
                <p>{{ product.description }}</p>
            </div>
        <div class="col-6 col-md-6">
            immagine
            <img src="#" alt="" />
        </div>
    </div>
    <div v-else>Loading product</div>
</template>

<script>
import axios from "axios";

export default {
    name: "ProductDetail",
    data() {
        return {
            product: null,
        };
    },
    created() {
        this.getProductDetail();
    },
    methods: {
        getProductDetail() {
            console.log("dettagli prodotto presi");
        },
    },
};
</script>

<style lang="scss" scoped></style>
