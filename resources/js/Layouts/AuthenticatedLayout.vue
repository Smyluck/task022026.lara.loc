<script setup>
import { ref } from "vue";
import Navigation from "@/Layouts/Navigation.vue";
import Flash from "@/Components/Flash.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 flex flex-col">
            <Navigation />

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <h2
                        class="font-semibold text-xl text-gray-800 leading-tight"
                    >
                        <slot name="header" />
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div
                            class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                        >
                            <div class="p-6 bg-white border-b border-gray-200">
                                <Flash />
                                <slot />
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="bg-white shadow mt-auto">
                <div
                    class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-end text-gray-500"
                >
                    Все права защищены @ Smyluck 2026
                </div>
            </footer>
        </div>
    </div>
</template>
