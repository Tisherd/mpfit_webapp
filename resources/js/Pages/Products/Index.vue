<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import CrudTable from "@/Components/CrudTable.vue";

defineProps({
    products: Object,
});

const headers = [
    { key: "name", label: "Название" },
    { key: "category.name", label: "Категория" },
    { key: "price", label: "Цена" },
];

const baseRoute = "/products";
</script>

<template>
    <MainLayout>
        <CrudTable
            :headers="headers"
            headerTitle="Товары"
            :items="products.data"
            :links="products.links"
            :baseRoute="baseRoute"
        />
    </MainLayout>
</template>
