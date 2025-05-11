<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from "@/Components/Sections/Header.vue";
import Banner from "@/Components/Sections/Banner.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    }
});

</script>

<template>
    <Head title="Homepage" />
    <Header :canLogin="canLogin" :canRegister="canRegister" />
    <Banner />
</template>
