<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <header class="bg-gray-600 text-white p-3 flex justify-between items-center">
        <ul class="flex space-x-4 pl-20">
            <li>
                <Link href="/" class="hover:underline">О проекте</Link>
            </li>
            <li>
                <Link href="/products" class="hover:underline">Товары</Link>
            </li>
            <li>
                <Link href="/orders" class="hover:underline">Заказы</Link>
            </li>
        </ul>
    </header>
</template>
