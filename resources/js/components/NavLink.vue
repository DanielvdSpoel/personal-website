<template>
    <li>
        <Link class="relative block px-3 py-2 transition hover:text-teal-500 dark:hover:text-teal-400"
              :href="route(routeName)">
            {{ label }}
            <span v-if="route().current(routeName)" class="absolute inset-x-1 -bottom-px h-px bg-gradient-to-r from-teal-500/0 via-teal-500/40 to-teal-500/0 dark:from-teal-400/0 dark:via-teal-400/40 dark:to-teal-400/0">
            </span>
        </Link>
    </li>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    name: "NavLink",
    props: {
        label: {
            type: String,
            required: true
        },
        routeName: {
            type: String,
            required: true
        }
    },
    components: {Link}
}
</script>

<style scoped>

</style>
