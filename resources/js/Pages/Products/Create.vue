<script setup>
import { router, useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import InputError from '@/Components/Base/InputError.vue';

defineProps({
    categories: Array
});

const form = useForm({
    name: null,
    category_id: null,
    description: null,
    price: null
});

const submit = () => {
    form.post('/products');
};
</script>

<template>
    <MainLayout>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
            <h1 class="text-2xl font-semibold mb-6">Добавить товар</h1>

            <form @submit.prevent="submit" class="space-y-5">
                <div>
                    <label class="block font-medium text-gray-700">Название</label>
                    <input v-model="form.name" required class="border border-gray-300 rounded-lg w-full p-2 mt-1 focus:ring-2 focus:ring-blue-400" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Категория</label>
                    <select v-model="form.category_id" required class="border border-gray-300 rounded-lg w-full p-2 mt-1 focus:ring-2 focus:ring-blue-400">
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.category_id" />
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Описание</label>
                    <textarea v-model="form.description" class="border border-gray-300 rounded-lg w-full p-2 mt-1 focus:ring-2 focus:ring-blue-400"></textarea>
                    <InputError class="mt-2" :message="form.errors.description" />
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Цена (₽)</label>
                    <input v-model="form.price" required type="number" step="0.01" class="border border-gray-300 rounded-lg w-full p-2 mt-1 focus:ring-2 focus:ring-blue-400" />
                    <InputError class="mt-2" :message="form.errors.price" />
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                        Добавить
                    </button>
                    <button @click="router.visit('/products')" type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">
                        Отмена
                    </button>
                </div>
            </form>
        </div>
    </MainLayout>
</template>
