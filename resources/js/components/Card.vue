<template>

<section>
  <div v-for="product in list"
   :key="`product-${product.id}`"
    class="card text-center">

      <h1>{{product.name}}</h1>
      <h1>{{product.description}}</h1>
      <h2>{{product.price}}</h2>
  </div>
</section>

</template>

<script>
export default {
name:'Card',
props:{
  list:Array,
}
}
</script>

<style>

</style>