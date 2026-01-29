<script setup>
import { Link } from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
import ProductItem from "@/Components/ProductItem.vue";
import Filter from "@/Components/Filter.vue";

defineProps({
    products: Object,
    filters: Object,
});
</script>

<template>
    <div
        class="flex justify-end"
        v-if="$page.props.auth.user && route().current('admin.products.index')"
    >
        <Link
            :href="route('admin.products.create')"
            class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900 ms-4"
            >Добавить товар
        </Link>
    </div>

    <Filter :filters="filters" />

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
