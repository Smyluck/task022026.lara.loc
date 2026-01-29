<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Textarea from "@/Components/Textarea.vue";
import Select from "@/Components/Select.vue";

const form = useForm({
    name: "",
    description: "",
    price: "",
    category_id: null,
});

const props = defineProps({
    title: String,
});

const submit = () => {
    form.post(route("admin.products.store"));
};
</script>

<template>
    <AuthenticatedLayout>
        <Head :title="props.title" />

        <template #header>
            {{ props.title }}
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Название" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="category_id" value="Категория" />

                <Select
                    id="category_id"
                    class="mt-1 block w-full"
                    :url="route('api.categories.index')"
                    v-model="form.category_id"
                />

                <InputError class="mt-2" :message="form.errors.category_id" />
            </div>

            <div class="mt-4">
                <InputLabel for="description" value="Описание" />

                <Textarea
                    id="description"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.description"
                />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <div class="mt-4">
                <InputLabel for="price" value="Цена" />

                <TextInput
                    id="price"
                    type="number"
                    step="0.01"
                    class="mt-1 block w-full"
                    v-model="form.price"
                    required
                />

                <InputError class="mt-2" :message="form.errors.price" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Добавить
                </PrimaryButton>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
