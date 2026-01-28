<script setup>
import { ref, watch } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const flashError = ref(page.props.flash?.error);
const flashWarning = ref(page.props.flash?.warning);

watch(
    () => page.props.flash || {},
    (newFlash) => {
        flashError.value = newFlash?.error;
        flashWarning.value = newFlash?.warning;
    },
    { deep: true },
);
</script>

<template>
    <div
        v-if="flashError"
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5"
        role="alert"
    >
        {{ flashError }}
    </div>

    <div
        v-if="flashWarning"
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5"
        role="alert"
    >
        {{ flashWarning }}
    </div>
</template>
