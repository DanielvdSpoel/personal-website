<template>
    <form @submit.prevent="submit"
          class="rounded-2xl border border-zinc-100 p-6 dark:border-zinc-700/40">
        <h2 class="flex text-sm font-semibold text-zinc-900 dark:text-zinc-100">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5"
                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                 class="h-6 w-6 flex-none">
                <path
                    d="M2.75 7.75a3 3 0 0 1 3-3h12.5a3 3 0 0 1 3 3v8.5a3 3 0 0 1-3 3H5.75a3 3 0 0 1-3-3v-8.5Z"
                    class="fill-zinc-100 stroke-zinc-400 dark:fill-zinc-100/10 dark:stroke-zinc-500"></path>
                <path d="m4 6 6.024 5.479a2.915 2.915 0 0 0 3.952 0L20 6"
                      class="stroke-zinc-400 dark:stroke-zinc-500"></path>
            </svg>
            <span class="ml-3">{{ $t('pages.home.contact.title') }}</span>
        </h2>
        <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">
            {{ $t('pages.home.contact.subtitle') }}
        </p>

        <div class="mt-6">
            <div>
                <input type="text" :placeholder="$t('labels.name')" aria-label="Name" v-model="form.name"
                       class="w-full flex-auto appearance-none rounded-md border border-zinc-900/10 bg-white px-3 shadow-md shadow-zinc-800/5 placeholder:text-zinc-400 focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 dark:border-zinc-700 dark:bg-zinc-700/[0.15] dark:text-zinc-200 dark:placeholder:text-zinc-500 dark:focus:border-teal-400 dark:focus:ring-teal-400/10 sm:text-sm">
                <div class="mt-2 flex items-center text-sm font-medium text-red-500" v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>
            <div class="mt-3">
                <textarea type="text" :placeholder="$t('labels.message')" aria-label="Name" required="" v-model="form.message"
                          class="w-full flex-auto appearance-none rounded-md border border-zinc-900/10 bg-white px-3 shadow-md shadow-zinc-800/5 placeholder:text-zinc-400 focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 dark:border-zinc-700 dark:bg-zinc-700/[0.15] dark:text-zinc-200 dark:placeholder:text-zinc-500 dark:focus:border-teal-400 dark:focus:ring-teal-400/10 sm:text-sm"></textarea>
                <div class="mt-2 flex items-center text-sm font-medium text-red-500" v-if="form.errors.message">{{ form.errors.message }}</div>

            </div>
            <div class="flex mt-3">
                <input type="email" :placeholder="$t('labels.email')" aria-label="Email address" required="" v-model="form.email"
                       class="min-w-0 flex-auto appearance-none rounded-md border border-zinc-900/10 bg-white px-3 py-[calc(theme(spacing.2)-1px)] shadow-md shadow-zinc-800/5 placeholder:text-zinc-400 focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 dark:border-zinc-700 dark:bg-zinc-700/[0.15] dark:text-zinc-200 dark:placeholder:text-zinc-500 dark:focus:border-teal-400 dark:focus:ring-teal-400/10 sm:text-sm">
                <button :disabled="form.processing"
                    class="inline-flex items-center gap-2 justify-center rounded-md py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-zinc-800 font-semibold text-zinc-100 hover:bg-zinc-700 active:bg-zinc-800 active:text-zinc-100/70 dark:bg-zinc-700 dark:hover:bg-zinc-600 dark:active:bg-zinc-700 dark:active:text-zinc-100/70 ml-4 flex-none"
                    type="submit">
                    {{ $t('labels.send')}}
                </button>
            </div>
            <div class="mt-2 flex items-center text-sm font-medium text-red-500" v-if="form.errors.email">{{ form.errors.email }}</div>

            <p v-if="showSuccessMessage" class="mt-4 flex items-center text-sm font-medium text-teal-500">{{ $t('pages.contact.success')}} </p>
        </div>
    </form>
</template>

<script>
import {useForm} from '@inertiajs/vue3'

export default {
    name: "ContactForm",
    methods: {
        submit() {
            this.form.post(route('contact', {language: route().params.language}), {
                preserveScroll: true,
                onSuccess: () => this.showSuccessMessage = true,

            })
        }
    },
    data() {
        return {
            showSuccessMessage: false,
            form: useForm({
                name: null,
                email: null,
                message: null,
            })
        }
    },


}
</script>

<style scoped>

</style>
