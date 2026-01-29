<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <nav class="border-b border-gray-100 bg-white">
        <!-- Primary Navigation Menu -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex shrink-0 items-center">
                        <Link :href="route('welcome')">
                            <ApplicationLogo
                                class="block h-9 w-auto fill-current text-gray-800"
                            />
                        </Link>
                    </div>

                    <!-- Navigation Links -->
                    <div
                        v-if="$page.props.auth.user"
                        class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
                    >
                        <NavLink
                            :href="route('admin.products.index')"
                            :active="route().current('admin.products.index')"
                        >
                            Управление товарами
                        </NavLink>
                    </div>
                </div>

                <!-- Проверка авторизации -->
                <div
                    v-if="$page.props.auth.user"
                    class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
                >
                    <NavLink :href="route('logout')" method="post">
                        Выйти
                    </NavLink>
                </div>
                <div v-else class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <NavLink :href="route('login')"> Войти </NavLink>
                    <NavLink :href="route('register')"> Регистрация </NavLink>
                </div>

                <!-- Кнопка гамбургер-меню для мобильных устройств -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button
                        @click="
                            showingNavigationDropdown =
                                !showingNavigationDropdown
                        "
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                    >
                        <svg
                            class="h-6 w-6"
                            stroke="currentColor"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                :class="{
                                    hidden: showingNavigationDropdown,
                                    'inline-flex': !showingNavigationDropdown,
                                }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                            <path
                                :class="{
                                    hidden: !showingNavigationDropdown,
                                    'inline-flex': showingNavigationDropdown,
                                }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
            :class="{
                block: showingNavigationDropdown,
                hidden: !showingNavigationDropdown,
            }"
            class="sm:hidden"
        >
            <div class="space-y-1 pb-3 pt-2">
                <ResponsiveNavLink
                    :href="route('admin.products.index')"
                    :active="route().current('admin.products.index')"
                >
                    Управление товарами
                </ResponsiveNavLink>
            </div>

            <!-- Проверка авторизации для мобильного меню -->
            <div
                v-if="$page.props.auth.user"
                class="border-t border-gray-200 pb-1 pt-4"
            >
                <ResponsiveNavLink
                    :href="route('logout')"
                    method="post"
                    as="button"
                >
                    Выйти
                </ResponsiveNavLink>
            </div>
            <div v-else class="border-t border-gray-200 pb-1 pt-4">
                <ResponsiveNavLink
                    :href="route('logout')"
                    method="post"
                    as="button"
                >
                    Войти
                </ResponsiveNavLink>
                <ResponsiveNavLink
                    :href="route('register')"
                    method="post"
                    as="button"
                >
                    Регистрация
                </ResponsiveNavLink>
            </div>
        </div>
    </nav>
</template>
