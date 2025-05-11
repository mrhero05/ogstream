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
} from '@/Components/ui/navigation-menu'

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});


</script>
<template>
    <header class="py-3 border-grid sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
        <nav v-if="canLogin" class="container mx-auto flex flex-1 justify-end">
            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem v-if="$page.props.auth.user">
                        <NavigationMenuLink
                            :href="route('dashboard')"
                            :class="navigationMenuTriggerStyle()">
                            Dashboard
                        </NavigationMenuLink>
                    </NavigationMenuItem>
                    <NavigationMenuItem v-else>
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
                </NavigationMenuList>
            </NavigationMenu>
        </nav>
    </header>
</template>
