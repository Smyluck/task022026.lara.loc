<script setup>
import { router } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const props = defineProps({
    categories: Object,
    filters: Object,
});

const selectedCategory = ref(props.filters?.category ?? null);

watch(selectedCategory, (newCategoryId) => {
    router.get(
        window.location.pathname,
        { category: newCategoryId },
        {
            preserveState: true,
            preserveScroll: true,
            replace: true,
            only: ["products", "flash"],
        },
    );
});
</script>

<template>
    <div class="mb-12">
        <label for="category" class="block text-sm font-medium text-gray-700">
            Категория:
        </label>
        <select
            id="category"
            v-model="selectedCategory"
            class="mt-1 block w-full pl-3 pr-10 py-2 focus:outline-none border-gray-600 text-gray-600 rounded-md"
        >
            <option :value="null">Все категории</option>
            <option
                v-for="category in categories"
                :key="category.id"
                :value="category.id"
            >
                {{ category.name }}
            </option>
        </select>
    </div>
</template>
