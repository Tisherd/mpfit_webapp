<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import CrudTable from "@/Components/CrudTable.vue";

defineProps({
    orders: Object,
});

const headers = [
    { key: "id", label: "Номера заказа (ID)" },
    { funcKey: (order) => new Date(order.created_at).toLocaleString(), label: "Дата создания" },
    { key: "customer_name", label: "ФИО покупателя" },
    { key: "status", label: "Статуса заказа" },
    { funcKey: (order) => (order.product_quantity * order.product.price).toFixed(2) + ' ₽' , label: "Итоговая цена" },
];

const baseRoute = "/orders";
</script>

<template>
    <MainLayout>
        <CrudTable
            :headers="headers"
            headerTitle="Заказы"
            :items="orders.data"
            :links="orders.links"
            :baseRoute="baseRoute"
        />
    </MainLayout>
</template>
