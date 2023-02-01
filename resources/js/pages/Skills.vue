<template>
    <Layout>
        <div class="sm:px-8 mt-16 sm:mt-32">
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="relative px-4 sm:px-8 lg:px-12">
                    <div class="mx-auto max-w-2xl lg:max-w-5xl">
                        <header class="max-w-2xl">
                            <h1 class="text-4xl font-bold tracking-tight text-zinc-800 dark:text-zinc-100 sm:text-5xl">
                                {{  $t('pages.skills.title') }}
                            </h1>
                            <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">
                                {{  $t('pages.skills.description') }}
                            </p>
                        </header>
                        <div class="mt-16 sm:mt-20">
                            <ul role="list" class="grid grid-cols-1 gap-x-12 gap-y-16 sm:grid-cols-2 lg:grid-cols-3">
                                <SkillRow v-for="skill in skills" :key="skill.id" :skill="skill" />
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "../Layout.vue";
import SkillRow from "../components/Skills/SkillRow.vue";

export default {
    name: "Skills",
    components: {SkillRow, Layout},
    props: {
        skills: Array,
    }
}
</script>

<style scoped>

</style>
