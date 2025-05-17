<script setup>
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from '@/Components/ui/carousel';
import Autoplay from 'embla-carousel-autoplay';
import { Skeleton } from '@/Components/ui/skeleton'
import { ref } from 'vue';

const props = defineProps({
    filmsNowPlaying : Object
});

const imageLoaded = ref(false);

</script>

<template>
  <Carousel class="relative"
    :plugins="[Autoplay({
        delay: 5000,
        stopOnMouseEnter: true,

    })]"
    :opts="{
        loop: true,
        dot: true
    }"
  >
    <CarouselContent>
      <CarouselItem v-for="data in props.filmsNowPlaying">
        <div class="relative">
            <!-- Desktop Banner -->
            <Skeleton v-if="!imageLoaded" class="h-[calc(100dvh-58px)] w-[calc(100%-20px)] rounded-xl m-[10px]" />
            <div class="relative hidden md:block">
                 <img class="h-[calc(100dvh-58px)] object-cover w-full" :src="`https://image.tmdb.org/t/p/original` + data.backdrop_path" :alt="`OGStream ` + data.title" @load="imageLoaded = true">
                 <div class="absolute inset-0 dark-overlay"></div>
                 <!-- Banner Description -->
                 <div class="absolute top-[50%] left-15 -translate-y-1/2 w-[30%]">
                     <img class="w-[250px] h-auto" :src="`https://image.tmdb.org/t/p/original` + data.images.logos[0]['file_path']" :alt="`OGStream Logo` + data.title">
                     <p class="text-os-white line-clamp-4">{{ data.overview }}</p>
                 </div>
            </div>
            <!-- Mobile Banner -->
            <img class="block md:hidden h-[calc(100dvh-58px)] object-cover w-full" :src="`https://image.tmdb.org/t/p/original` + data.poster_path" :alt="`OGStream ` + data.title">
            {{ data }}
        </div>
      </CarouselItem>
    </CarouselContent>
    <div class="">
        <CarouselPrevious class="absolute top-[50%] translate-y-1/2 left-5 hover:cursor-pointer opacity-30 hover:opacity-100 transition-all" />
        <CarouselNext class="absolute top-[50%] translate-y-1/2 right-5 hover:cursor-pointer opacity-30 hover:opacity-100 transition-all" />
    </div>
  </Carousel>
</template>
