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

const navigateToUnit = (volumeId) => {
    window.location.href = `/lessons/${volumeId}`; // 假设 Laravel 的路由是这种形式
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                册次列表
            </h2>
        </template>

        <div class="p-6 bg-white shadow-md rounded-lg">
            <h1 class="text-2xl font-semibold mb-4">{{course.title}}</h1>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">年级</th>
                        <th class="py-3 px-6 text-left">册次</th>
                        <th class="py-3 px-6 text-center">操作</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <tr v-for="volume in volumes" :key="volume.id" class="border-b border-gray-300 hover:bg-gray-100" @click="navigateToUnit(volume.id)">
                        <td class="py-3 px-6 text-left">{{ volume.id }}</td>
                        <td class="py-3 px-6 text-left">{{ volume.grade_char }}</td>
                        <td class="py-3 px-6 text-left">{{ volume.semester_char }}</td>
                        <td class="py-3 px-6 text-center">
                            <button @click="editVolume(volume.id)" class="text-blue-500 hover:text-blue-700">编辑</button>
                            <button @click="deleteVolume(volume.id)" class="text-red-500 hover:text-red-700 ml-2">删除</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>