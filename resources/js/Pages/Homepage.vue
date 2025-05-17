<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from "@/Components/Sections/Header.vue";
import Banner from "@/Components/Sections/Banner.vue";
import { Toaster } from '@/Components/ui/sonner';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    filmsNowPlaying: {
        type: Object
    }
});

</script>

<template>
    <Toaster />
    <Head title="Homepage" />
    <Header :canLogin="canLogin" :canRegister="canRegister" />
    <Banner :filmsNowPlaying="filmsNowPlaying" />
</template>
