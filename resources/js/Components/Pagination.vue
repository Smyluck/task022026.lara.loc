<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    links: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <div class="mt-6" v-if="links.length > 3">
        <div class="flex justify-center">
            <nav
                class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
            >
                <Link
                    v-for="(link, index) in links"
                    :key="index"
                    :href="link.url || '#'"
                    class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap"
                    :class="{
                        'z-10 bg-indigo-50 border-gray-600 text-gray-600':
                            link.active,
                        'bg-white border-gray-300 text-gray-500 hover:bg-gray-50':
                            !link.active,
                    }"
                    v-html="link.label"
                />
            </nav>
        </div>
    </div>
</template>
