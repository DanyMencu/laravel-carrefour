<template>
    <header class="mb-3">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">
                <img src="../../../public/images/carrefour-logomark.svg" alt="logo-carrefour" class="logo">
                Carrefour
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- Home -->
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
                    </li>
                    <!-- Products -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Products</a>
                        <!-- <router-link class="nav-link" :to="{name: 'products'}">Our Products</router-link> -->
                    </li>
                    <!-- Contact -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                        <!-- <router-link class="nav-link" :to="{name: 'contact'}">Contact Us</router-link> -->
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Headers',

}
</script>

<style lang="scss" scoped>
* {
    color: #fff;
}
    header {
        background-color: #1b3d79;
    }
    .active {
        background: rgba(#fff, .1);
        border-radius: 30px;
    }
</style>