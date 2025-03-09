<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedTeacherLayout.vue';
import { Head } from '@inertiajs/vue3';
const props = defineProps({
    volumes: Array,
    course: Object, // 接收课程信息
});

const editVolume = (id) => {
    console.log('编辑课程:', id);
};

const deleteVolume = (id) => {
    console.log('删除课程:', id);
};

const navigateToUnit = (unitId) => {
    window.location.href = `/units/${unitId}`;
};
</script>

<template>
    <Head title="册次表" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{course.title}} 册次表
            </h2>
        </template>
        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">册次</th>
                            <th class="py-3 px-6 text-left">一单元</th>
                            <th class="py-3 px-6 text-left">二单元</th>
                            <th class="py-3 px-6 text-left">三单元</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr v-for="volume in volumes" :key="volume.id" class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ volume.grade_char }}{{ volume.semester_char }}</td>
                            <td class="py-3 px-6 text-left">
                                    <div>
                                        <a
                                            v-if="volume.units[0]"
                                            href="#"
                                            @click.prevent="navigateToUnit(volume.units[0].id)"
                                        >
                                            {{ volume.units[0].title }}
                                        </a>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div>
                                        <a
                                            v-if="volume.units[1]"
                                            href="#"
                                            @click.prevent="navigateToUnit(volume.units[1].id)"
                                        >
                                            {{ volume.units[1].title }}
                                        </a>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div>
                                        <a
                                            v-if="volume.units[2]"
                                            href="#"
                                            @click.prevent="navigateToUnit(volume.units[2].id)"
                                        >
                                            {{ volume.units[2].title }}
                                        </a>
                                    </div>
                                </td>
                        </tr>
                    </tbody>
                </table>
</main>
    </AuthenticatedLayout>
</template>