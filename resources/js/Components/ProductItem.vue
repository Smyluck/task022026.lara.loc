<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import NavLink from "./NavLink.vue";
import Modal from "./Modal.vue";
import DangerButton from "./DangerButton.vue";
import SecondaryButton from "./SecondaryButton.vue";

const props = defineProps({
    product: {
        type: Object,
        required: true,
    },
});

const form = useForm({});

const confirmingProductDeletion = ref(false);

const deleteProduct = () => {
    form.delete(route("admin.products.destroy", props.product.id), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        // onError: () => passwordInput.value.focus(),
        // onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingProductDeletion.value = false;
    form.reset();
};

const corfirmProductDeletion = () => {
    confirmingProductDeletion.value = true;
};
</script>

<template>
    <Link
        :href="route('product.show', product.id)"
        class="block p-6 bg-gray-100 rounded shadow hover:bg-gray-200"
    >
        <h3 class="text-gray-700 font-semibold">
            {{ product.name }}
        </h3>
        <div class="mt-2 break-words">
            <p class="text-gray-600">
                <span class="font-medium">Категория:</span>
                {{ product.category?.name || "Без категории" }}
            </p>
            <p class="text-gray-600 font-medium">
                <span class="font-medium">Цена:</span>
                {{ product.price }}
            </p>
            <p class="text-gray-600">
                <span class="font-medium">Описание:</span>
                {{ product.description }}
            </p>
        </div>
        <div
            class="mt-2 flex gap-3 flex-col md:flex-row"
            v-if="
                $page.props.auth.user && route().current('admin.products.index')
            "
        >
            <Link
                :href="route('admin.products.edit', product.id)"
                class="bg-white hover:border-gray-300 hover:text-white border-gray-600 text-gray-600 hover:bg-gray-500 p-2 rounded text-center"
                >Редактировать</Link
            >

            <DangerButton @click.prevent="corfirmProductDeletion"
                >Удалить</DangerButton
            >
        </div>
    </Link>

    <Modal :show="confirmingProductDeletion" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">Удалить товар?</h2>

            <p class="mt-1 text-sm text-gray-600">Вы уверены?</p>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal"> Нет </SecondaryButton>

                <DangerButton
                    class="ms-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="deleteProduct()"
                >
                    Да
                </DangerButton>
            </div>
        </div>
    </Modal>
</template>
