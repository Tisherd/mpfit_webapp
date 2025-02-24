<script setup>
import Header from "@/Components/Header.vue";
</script>

<template>
    <div class="bg-gray-100 text-gray-800 flex flex-col min-h-screen overflow-hidden">
        <Header />
        <main class="container mx-auto px-4 py-8 flex-grow">
            <slot />
        </main>
    </div>
</template>
