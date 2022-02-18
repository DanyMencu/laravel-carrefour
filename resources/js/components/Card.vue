<template>
  <section>
    <div class="card">
      <div class='img-container'>
        <img :src="product.cover" :alt="product.title" class="img-fluid">
      </div>
      <router-link :to="{name: `ProductDetail`, params:{slug: product.slug}}"><span class="product-name">{{product.name}}</span></router-link>
      <h5 class='mt-4'>€ {{product.price}}</h5>
      <div class="btn-container text-right mt-4">
        <button class='btn btn-primary'><i class="fa-solid fa-cart-shopping text-white"></i></button>
      </div>
    </div>
  </section>

</template>

<script>
export default {
name:'Card',
props:{
  product:Object,
}
}
</script>

<style lang="scss" scoped>
  .card{
    padding: 10px;
    border: 2px solid #cdf4ff;
    border-radius: 20px;
    h5, product-name{
      color:#0e3368 !important;
    }
    product-name{
      font-weight: 600 !important;
    }
    .btn-container{
      button{
        padding: 5px 25px;
        border-radius: 50px;
      }
    }
  }
</style>