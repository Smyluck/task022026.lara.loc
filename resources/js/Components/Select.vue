<script setup>
import { onMounted, ref, onUnmounted } from "vue";
import axios from "axios";
import { router } from "@inertiajs/vue3";

const model = defineModel({
    validator: (value) => {
        return (
            typeof value === "string" ||
            typeof value === "number" ||
            value == null
        );
    },
});

const select = ref(null);
const items = ref([]);

const props = defineProps({
    url: String,
});

const loadItems = async () => {
    try {
        const token = localStorage?.getItem("authToken");
        if (token) {
            axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
        } else {
            delete axios.defaults.headers.common["Authorization"];
        }
        const response = await axios.get(props.url);
        items.value = response.data;
    } catch (err) {
        console.error("Ошибка загрузки категорий:", err);
    }
};

const handleLogout = () => {
    items.value = []; // Очищаем данные
    loadItems(); // Перезагружаем данные
};

onMounted(() => {
    loadItems();
    window.addEventListener("logout", handleLogout); // Добавляем прослушивание события
});

onUnmounted(() => {
    window.removeEventListener("logout", handleLogout); // Удаляем прослушивание события
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
