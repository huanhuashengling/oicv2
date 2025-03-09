<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedTeacherLayout.vue';
import { Head } from '@inertiajs/vue3';
const props = defineProps({
    lessons: Array,
    unit: Object,
    volume: Object,
});

const editUnit = (id) => {
    console.log('编辑课程:', id);
};

const deleteUnit = (id) => {
    console.log('删除课程:', id);
};

const navigateToVolume = () => {
    window.location.href = `/volumes`;
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ volume.grade_char }}{{ volume.semester_char }}{{ unit.sort_order }}单元 {{ unit.title }}
                </h2>
                <a href="#" @click.prevent="navigateToVolume()"
                   class="text-blue-500 hover:text-blue-700 transition duration-200 ease-in-out rounded-lg bg-blue-100 px-3 py-1 text-sm font-medium shadow-sm">
                    返回册次列表
                </a>
            </div>
        </template>

        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">课编号</th>
                        <th class="py-3 px-6 text-left">课题</th>
                        <th class="py-3 px-6 text-left">活动数量</th>
                        <th class="py-3 px-6 text-left">授课次数</th>
                        <th class="py-3 px-6 text-left">作业完成率</th>
                        <th class="py-3 px-6 text-center">操作</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                        <template v-for="lesson in lessons" :key="lesson.id">
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ lesson.lesson_code }}</td>
                                <td class="py-3 px-6 text-left">{{ lesson.title }}</td>
                                <td class="py-3 px-6 text-left">3</td>
                                <td class="py-3 px-6 text-left">12</td>
                                <td class="py-3 px-6 text-left">80%</td>
                                <td class="py-3 px-6 text-center">
                                    <button @click="editLesson(lesson.id)" class="text-blue-500 hover:text-blue-700">编辑</button>
                                    <button @click="deleteLesson(lesson.id)" class="text-red-500 hover:text-red-700 ml-2">删除</button>
                                </td>
                            </tr>
                        </template>
                </tbody>
            </table>
        </main>
    </AuthenticatedLayout>
</template>