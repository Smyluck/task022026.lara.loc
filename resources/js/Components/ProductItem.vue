<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    product: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Link
        :href="route('product.show', product.id)"
        class="block p-6 bg-gray-100 rounded shadow hover:bg-gray-200"
    >
        <h3 class="text-gray-700 font-semibold">
            {{ product.name }}
        </h3>
        <div class="mt-2">
            <p class="text-gray-600">
                <span class="font-medium">Категория:</span>
                {{ product.category?.name || "Без категории" }}
            </p>
            <p class="text-gray-600 font-medium">
                <span class="font-medium">Цена:</span>
                {{ product.price }}
            </p>
            <p class="text-gray-600">
                <span class="font-medium">Описание:</span>
                {{ product.description }}
            </p>
        </div>
        <div
            class="mt-2 flex gap-3 flex-col md:flex-row"
            v-if="
                $page.props.auth.user && route().current('admin.products.index')
            "
        >
            <Link
                :href="route('admin.products.edit', product.id)"
                class="bg-white hover:border-gray-300 hover:text-white border-gray-600 text-gray-600 hover:bg-gray-500 p-2 rounded text-center"
                >Редактировать</Link
            >
            <Link
                :href="route('admin.products.destroy', product.id)"
                method="delete"
                class="bg-white hover:border-gray-300 hover:text-white border-gray-600 text-gray-600 hover:bg-gray-500 p-2 rounded"
                >Удалить</Link
            >
        </div>
    </Link>
</template>
