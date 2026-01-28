<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProductList from "@/Components/ProductList.vue";

const props = defineProps({
    title: String,
    products: Object,
    categories: Object,
});
</script>

<template>
    <Head :title="props.title" />
    <AuthenticatedLayout>
        <template #header>
                {{ props.title }}
        </template>

        <ProductList :products="products" :categories="categories" />
    </AuthenticatedLayout>
</template>