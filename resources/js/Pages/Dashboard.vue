<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Админка" />

    <AuthenticatedLayout>
        <template #header> Админка </template>

        Вы вошли!
    </AuthenticatedLayout>
</template>
