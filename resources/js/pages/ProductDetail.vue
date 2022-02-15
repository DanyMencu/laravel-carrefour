<template>
    <div class="container">
        <div class="row" v-if="product">
            <div class="col-12 col-md-6">
                <!-- Nome -->
                <h1 class="my-4 product-name">{{ product.name }}</h1>
                <!-- Prezzo -->
                <h2 class="price mb-4">{{ product.price }} €</h2>
                <!-- categorie -->
                <h3 v-if="product.category" class="mb-3 category">
                    Categoria: {{ product.category.status }}
                </h3>
                <h3 v-else class="mb-3 category">
                    Non ci sono categorie per questo post
                </h3>
                <!-- Types -->
                <h4 v-if="product.type" class="badge badge-primary p-1 mb-3">
                    Types: {{ product.type.name }}
                </h4>
                <h4 class="badge badge-primary mb-3" v-else>
                    Questo prodotto non è classificabile
                </h4>
                <!-- Allergeni -->
                <div class="container-allergens" v-if="product.allergens">
                    <h4
                        class="badge badge-success p-1 mb-3 mr-2"
                        v-for="allergen in product.allergens"
                        :key="`allergen-${allergen.id}`"
                    >
                        {{ allergen.name }}
                    </h4>
                </div>
                <h4 class="badge badge-success mb-3" v-else>
                    Questo prodotto non contiene allergeni
                </h4>
                <!-- Descrizione -->
                <p class="description mb-4">{{ product.description }}</p>
                <div class="btn btn-success">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Acquista
                </div>
            </div>
            <div class="col-12 col-md-6 p-3">
                <figure class="img-product" v-if="product.cover">
                    <img :src="product.cover" :alt="product.title" />
                </figure>
            </div>
        </div>
        <div v-else>Loading!</div>
    </div>
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
            axios
                .get(
                    `http://127.0.0.1:8000/api/products/${this.$route.params.slug}`
                )
                .then((res) => {
                    // console.log(res.data);
                    if (res.data.not_found) {
                        // console.log("404");
                        this.$router.push({ name: "not-found" });
                    } else {
                        this.product = res.data;
                    }
                })
                .catch((err) => log.error(err));
        },
    },
};
</script>

<style lang="scss" scoped>
// Import file variabili

.product-name {
    color: #1b3d79;
}

.price {
    color: #fd0202;
    font-size: 32px;
}

.category {
    color: #1b3d79;
    font-size: 25px;
    font-style: italic;
}
// .types-allergen {
//     font-size: 20px;
//     color: #1b3d79;
//     font-style: italic;
// }

// .description {
//     font-size: 18px;
//     color: rgb(24, 24, 24);
// }
</style>
