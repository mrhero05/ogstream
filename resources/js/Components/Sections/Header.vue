<script setup>
import { Link } from '@inertiajs/vue3';
import {
  NavigationMenu,
  NavigationMenuContent,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
  NavigationMenuTrigger,
  navigationMenuTriggerStyle,
} from '@/Components/ui/navigation-menu';

import {
  Sheet,
  SheetContent,
  SheetDescription,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from '@/Components/ui/sheet'

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});


</script>
<template>
    <header class="py-1 border-grid sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
        <nav v-if="canLogin" class="container mx-auto">
            <NavigationMenu class="!max-w-full main-menu">
                <NavigationMenuList class="flex flex-row !max-w-full">
                    <NavigationMenuItem>
                        <NavigationMenuLink
                            :href="route('homepage')">
                            <img class="w-[150px] h-auto" src="@/assets/images/ogstream-logo.png" alt="ogstream_logo">
                        </NavigationMenuLink>
                    </NavigationMenuItem>
                    <NavigationMenuItem v-if="$page.props.auth.user">
                        <NavigationMenuLink
                            :href="route('dashboard')"
                            :class="navigationMenuTriggerStyle()">
                            Dashboard
                        </NavigationMenuLink>
                    </NavigationMenuItem>
                    <NavigationMenuItem v-else class="ml-auto gap-x-[5px] flex">
                        <NavigationMenuLink
                            :href="route('login')"
                            :class="navigationMenuTriggerStyle()">
                            Log In
                        </NavigationMenuLink>
                        <NavigationMenuLink
                            v-if="canRegister"
                            :href="route('register')"
                            :class="navigationMenuTriggerStyle()">
                            Register
                        </NavigationMenuLink>
                    </NavigationMenuItem>

                    <!-- Mobile Menu -->
                    <Sheet>
                        <SheetTrigger class="block md:hidden p-[8px_16px] hover:cursor-pointer"><i class="fa-solid fa-bars"></i></SheetTrigger>
                        <SheetContent>
                        <SheetHeader>
                            <SheetTitle>Menu</SheetTitle>
                            <SheetDescription>
                            This action cannot be undone. This will permanently delete your account
                            and remove your data from our servers.
                            </SheetDescription>
                        </SheetHeader>
                        </SheetContent>
                    </Sheet>
                </NavigationMenuList>
            </NavigationMenu>
        </nav>
    </header>
</template>
