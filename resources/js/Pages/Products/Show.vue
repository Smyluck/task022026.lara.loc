<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    product: Object,
});
</script>

<template>
    <Head :title="product.name" />
    <AuthenticatedLayout>
        <template #header>
                {{ product.name }}
        </template>

        <div>
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

        <div class="mt-5">
            <Link
                :href="route('welcome')"
                class="justify-center text-stone-600 hover:text-stone-800"
            >
                Назад к товарам
            </Link>
        </div>
    </AuthenticatedLayout>
</template>
