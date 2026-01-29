<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProductList from "@/Components/ProductList.vue";

const props = defineProps({
    title: String,
    products: Object
});
</script>

<template>
    <Head :title="props.title" />
    <AuthenticatedLayout>
        <template #header>
                {{ props.title }}
        </template>

        <ProductList :products="products"  />
    </AuthenticatedLayout>
</template>