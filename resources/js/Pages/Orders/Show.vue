<script setup>
import { defineProps } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
    order: Object
});

const destroy = (id) => {
    if (confirm("Вы уверены, что хотите удалить этот заказ?")) {
        router.delete(`/orders/${id}`);
    }
};
</script>

<template>
    <MainLayout>
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
            <h1 class="text-2xl font-semibold mb-4">Заказ {{ order.customer_name }}</h1>

            <div class="space-y-4">
                <div>
                    <span class="font-medium text-gray-700">Товар:</span>
                    <span class="ml-2 text-gray-900">{{ order.product.name }}</span>
                </div>

                <div>
                    <span class="font-medium text-gray-700">Комментарий покупателя:</span>
                    <p class="ml-2 text-gray-900">{{ order.comment || 'Нет комментария' }}</p>
                </div>

                <div>
                    <span class="font-medium text-gray-700">Статус заказа:</span>
                    <p class="ml-2 text-gray-900">{{ order.status }}</p>
                </div>

                <div>
                    <span class="font-medium text-gray-700">Итоговая цена:</span>
                    <span class="ml-2 text-gray-900">{{ (order.product_quantity * order.product_id.price).toFixed(2) }} ₽</span>
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <Link href="/orders" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">
                    Назад
                </Link>
                <div class="flex space-x-2">
                    <Link :href="`/orders/${order.id}/edit`"
                          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                        Редактировать
                    </Link>
                    <button @click.stop="destroy(order.id)"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
                        Удалить
                    </button>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
