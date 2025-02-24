<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

defineProps({
    categories: Array
});

const form = ref({
    name: '',
    category_id: '',
    description: '',
    price: ''
});

const submit = () => {
    // form.value.price = Math.round(parseFloat(form.value.price) * 100);
    router.post('/products', form.value);
};
</script>

<template>
    <MainLayout>
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Добавить товар</h1>
            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block">Название</label>
                    <input v-model="form.name" required class="border p-2 w-full" />
                </div>
                <div>
                    <label class="block">Категория</label>
                    <select v-model="form.category_id" required class="border p-2 w-full">
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>
                <div>
                    <label class="block">Описание</label>
                    <textarea v-model="form.description" class="border p-2 w-full"></textarea>
                </div>
                <div>
                    <label class="block">Цена (₽)</label>
                    <input v-model="form.price" required type="number" step="0.01" class="border p-2 w-full" />
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Сохранить</button>
            </form>
        </div>
    </MainLayout>
</template>
