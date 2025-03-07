<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedTeacherLayout.vue';
import { Head } from '@inertiajs/vue3';
const props = defineProps({
    units: Array,
    volume: Object,
});
console.log('Units:', props.units[0].title);
const editUnit = (id) => {
    console.log('编辑课程:', id);
};

const deleteUnit = (id) => {
    console.log('删除课程:', id);
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                课程列表
            </h2>
        </template>

        <div class="p-6 bg-white shadow-md rounded-lg">
            <h1 class="text-2xl font-semibold mb-4">{{ volume.grade_char }}{{ volume.semester_char }}</h1>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">单元号</th>
                        <th class="py-3 px-6 text-left">课编号</th>
                        <th class="py-3 px-6 text-left">课标题</th>
                        <th class="py-3 px-6 text-center">操作</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                   <template v-for="unit in units" :key="unit.id">
                        <template v-for="lesson in unit.lessons" :key="lesson.id">
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ lesson.id }}</td>
                                <td class="py-3 px-6 text-left">{{ unit.sort_order }}</td>
                                <td class="py-3 px-6 text-left">{{ lesson.lesson_code }}</td>
                                <td class="py-3 px-6 text-left">{{ lesson.title }}</td>
                                <td class="py-3 px-6 text-center">
                                    <button @click="editLesson(lesson.id)" class="text-blue-500 hover:text-blue-700">编辑</button>
                                    <button @click="deleteLesson(lesson.id)" class="text-red-500 hover:text-red-700 ml-2">删除</button>
                                </td>
                            </tr>
                        </template>
                    </template>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>