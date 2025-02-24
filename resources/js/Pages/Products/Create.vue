<script setup>
import { Link, useForm } from '@inertiajs/vue3';
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
        <div class="max-w-3xl mx-auto">
            <div class="w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Добавить товар
                </h1>

                <Link href="/products" class="text-indigo-600 hover:text-indigo-900 my-5 block">
                    Вернуться назад
                </Link>
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block">Название</label>
                    <input v-model="form.name" required class="border p-2 w-full" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div>
                    <label class="block">Категория</label>
                    <select v-model="form.category_id" required class="border p-2 w-full">
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.category_id" />
                </div>
                <div>
                    <label class="block">Описание</label>
                    <textarea v-model="form.description" class="border p-2 w-full"></textarea>
                    <InputError class="mt-2" :message="form.errors.description" />
                </div>
                <div>
                    <label class="block">Цена (₽)</label>
                    <input v-model="form.price" required type="number" step="0.01" class="border p-2 w-full" />
                    <InputError class="mt-2" :message="form.errors.price" />
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Сохранить</button>
            </form>
        </div>
    </MainLayout>
</template>
