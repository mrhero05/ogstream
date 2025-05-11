<script setup>
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from '@/Components/ui/carousel'
</script>

<template>
  <Carousel class="relative">
    <CarouselContent>
      <CarouselItem>1</CarouselItem>
      <CarouselItem>2</CarouselItem>
      <CarouselItem>3</CarouselItem>
    </CarouselContent>
    <div class="absolute translate-1/2">
        <CarouselPrevious class="" />
        <CarouselNext />
    </div>
  </Carousel>
</template>
