<script setup>
import { router } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import Select from "@/Components/Select.vue";
import InputLabel from "./InputLabel.vue";

const props = defineProps({
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
        },
    );
});
</script>

<template>
    <div class="mb-12">
        <InputLabel for="category" value="Категория" />

        <Select
            id="category"
            class="mt-1 block w-full"
            :url="route('api.categories.index')"
            v-model="selectedCategory"
        />
    </div>
</template>
