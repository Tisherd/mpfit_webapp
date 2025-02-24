<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import CrudTable from "@/Components/CrudTable.vue";

defineProps({
    orders: Object,
});

const headers = [
    { key: "customer_name", label: "ФИО покупателя" },
    { key: "product.name", label: "Товар" },
    { key: "status", label: "Статус" },
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
