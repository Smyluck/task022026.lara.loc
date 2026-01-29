<script setup>
import { router } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import Select from "@/Components/Select.vue";
import InputLabel from "./InputLabel.vue";
import TextInput from "./TextInput.vue";
import { debounce } from "lodash";

const props = defineProps({
    filters: Object,
});

const selectedCategory = ref(props.filters?.category ?? null);
const q = ref(props.filters?.q ?? "");

const debouncedSearch = debounce((query) => {
    router.get(
        window.location.pathname,
        { q: query, category: selectedCategory.value },
        {
            preserveState: true,
            preserveScroll: true,
            replace: true,
        },
    );
}, 500);

watch(selectedCategory, (newCategoryId) => {
    router.get(
        window.location.pathname,
        { category: newCategoryId, q: q.value },
        {
            preserveState: true,
            preserveScroll: true,
            replace: true,
        },
    );
});

watch(q, (newQuery) => {
    debouncedSearch(newQuery);
});
</script>

<template>
    <div class="mb-4">
        <InputLabel for="category" value="Категория" />

        <Select
            id="category"
            class="mt-1 block w-full"
            :url="route('api.categories.index')"
            v-model="selectedCategory"
        />
    </div>
    <div class="mb-12">
        <InputLabel for="search" value="Поиск" />

        <TextInput
            id="search"
            type="text"
            class="mt-1 block w-full"
            v-model="q"
        />
    </div>
</template>
