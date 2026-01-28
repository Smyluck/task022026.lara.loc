<script setup>
import Pagination from "@/Components/Pagination.vue";
import ProductItem from "@/Components/ProductItem.vue";
import Filter from "@/Components/Filter.vue";

defineProps({
    products: Object,
    categories: Object,
});
</script>

<template>
    <Filter :categories="categories" />

    <div v-if="products">
        <div class="grid grid-cols-1 gap-5">
            <ProductItem
                v-for="product in products.data"
                :key="product.id"
                :product="product"
            />
        </div>

        <Pagination :links="products.links" />
    </div>
</template>
