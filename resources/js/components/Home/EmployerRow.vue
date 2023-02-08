<template>
    <li class="flex gap-4">
        <div
            class="relative mt-1 flex h-10 w-10 flex-none items-center justify-center rounded-full shadow-md shadow-zinc-800/5 ring-1 ring-zinc-900/5 dark:border dark:border-zinc-700/50 dark:bg-zinc-800 dark:ring-0">
            <img :alt="employer.media.alt" :src="employer.media.url"
                 width="32" height="32"
                 class="h-7 w-7 rounded-full" loading="lazy" style="color:transparent"></div>
        <dl class="flex flex-auto flex-wrap gap-x-2">
            <dt class="sr-only">Company</dt>
            <dd class="w-full flex-none text-sm font-medium text-zinc-900 dark:text-zinc-100">
                {{ employer.name }}
            </dd>
            <dt class="sr-only">Position</dt>
            <dd class="text-xs text-zinc-500 dark:text-zinc-400">
                {{ employer.position }}
            </dd>
            <dt class="sr-only">Date</dt>
            <dd class="ml-auto text-xs text-zinc-400 dark:text-zinc-500"
                :aria-label="startDate + ' until '  + endDate">
                <time :datetime="startDate">{{ startDate }}</time>
                <span aria-hidden="true">—</span>
                <time :datetime="endDate">{{ endDate }}</time>
            </dd>
        </dl>
    </li>
</template>

<script>
import {DateTime} from "luxon";

export default {
    name: "EmployerRow",
    props: {
        employer: {
            type: Object,
            required: true
        }
    },
    computed: {
        startDate() {
            return DateTime.fromISO(this.employer.start_date).toLocaleString({month: 'long', year: 'numeric'});
        },
        endDate() {
            return this.employer.end_date == null ? this.$t('labels.present') : DateTime.fromISO(this.employer.end_date).toLocaleString({month: 'long', year: 'numeric'});
        }
    }
}
</script>

<style scoped>

</style>
