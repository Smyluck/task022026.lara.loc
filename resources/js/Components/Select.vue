<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";

const model = defineModel({
    type: Number,
    required: false,
});

const select = ref(null);
const items = ref([]);

const props = defineProps({
    url: String,
});

onMounted(async () => {
    if (select.value?.hasAttribute("autofocus")) {
        setTimeout(() => select.value?.focus(), 100);
    }

    try {
        const response = await axios.get(props.url);
        items.value = response.data;
    } catch (err) {
        console.error("Ошибка загрузки категорий:", err);
    }
});

defineExpose({ focus: () => select.value.focus() });
</script>

<template>
    <select
        v-model="model"
        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        ref="select"
    >
        <option :value="null">Все</option>
        <option v-for="item in items" :key="item.id" :value="item.id">
            {{ item.name }}
        </option>
    </select>
</template>
