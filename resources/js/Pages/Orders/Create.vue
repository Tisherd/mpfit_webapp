<script setup>
import { router, useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import InputError from '@/Components/Base/InputError.vue';

defineProps({
    products: Array
});

const form = useForm({
    customer_name: null,
    product_id: null,
    product_quantity: null,
    status: 'new',
    comment: null,
});

const submit = () => {
    form.post('/orders');
};
</script>

<template>
    <MainLayout>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
            <h1 class="text-2xl font-semibold mb-6">Добавить заказ</h1>

            <form @submit.prevent="submit" class="space-y-5">
                <div>
                    <label class="block font-medium text-gray-700">ФИО покупателя</label>
                    <input v-model="form.customer_name" required class="border border-gray-300 rounded-lg w-full p-2 mt-1 focus:ring-2 focus:ring-blue-400" />
                    <InputError class="mt-2" :message="form.errors.customer_name" />
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Товар</label>
                    <select v-model="form.product_id" required class="border border-gray-300 rounded-lg w-full p-2 mt-1 focus:ring-2 focus:ring-blue-400">
                        <option v-for="product in products" :key="product.id" :value="product.id">
                            {{ product.name }}
                        </option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.product_id" />
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Количество</label>
                    <input v-model="form.product_quantity" required type="number" class="border border-gray-300 rounded-lg w-full p-2 mt-1 focus:ring-2 focus:ring-blue-400" />
                    <InputError class="mt-2" :message="form.errors.product_quantity" />
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Статус заказа</label>
                    <select v-model="form.status" required class="border border-gray-300 rounded-lg w-full p-2 mt-1 focus:ring-2 focus:ring-blue-400">
                        <option>new</option>
                        <option>completed</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.status" />
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Комментарий покупателя</label>
                    <textarea v-model="form.comment" class="border border-gray-300 rounded-lg w-full p-2 mt-1 focus:ring-2 focus:ring-blue-400"></textarea>
                    <InputError class="mt-2" :message="form.errors.comment" />
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                        Добавить
                    </button>
                    <button @click="router.visit('/orders')" type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">
                        Отмена
                    </button>
                </div>
            </form>
        </div>
    </MainLayout>
</template>
