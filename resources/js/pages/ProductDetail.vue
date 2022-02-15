<template></template>

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
