<script setup>
import { Link, router } from "@inertiajs/vue3";
import UserLayouts from "./Layouts/UserLayouts.vue";
import Hero from "./Layouts/Hero.vue";
import Prod from "../User/Compo/Prod.vue";
//products list
defineProps({
  products: Array,
});
</script>
<template>
  <UserLayouts>
    <Hero> </Hero>

    <div class="bg-white">
      <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">List des Produits</h2>

        <!-- Product List components -->
        <Prod :products="products"> </Prod>

        <!-- End of product list components-->

        <div class="flex justify-center mt-5">
          <Link
            :href="route('product.index')"
            class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
          >
            View All the product
          </Link>
        </div>
      </div>
    </div>
  </UserLayouts>
</template>
