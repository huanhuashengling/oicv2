sail
./vendor/bin/sail artisan config:clear
./vendor/bin/sail artisan view:clear
./vendor/bin/sail artisan cache:clear
./vendor/bin/sail npm run dev

./vendor/bin/sail npm install vue-router

#命令行执行laravel代码
./vendor/bin/sail artisan tinker
#运行具体的seeder
./vendor/bin/sail artisan db:seed --class=DatabaseSeeder
#数据库全部重新开始，并包括seeder生成默认数据
./vendor/bin/sail artisan migrate:refresh --seed

./vendor/bin/sail npm install chart.js
./vendor/bin/sail artisan route:list | grep teacher

./vendor/bin/sail artisan make:Model Course

./vendor/bin/sail artisan db:seed





<template>
  <div>
    <h1>Welcome, Teacher!</h1>
    <p>This is your dashboard, where you can see insights into your students' performance.</p>

    <div class="stats">
      <div class="stat-item">
        <h3>Total Students</h3>
        <p>{{ totalStudents }}</p>
      </div>
      <div class="stat-item">
        <h3>Male to Female Ratio</h3>
        <p>{{ maleToFemaleRatio }}%</p>
      </div>
      <div class="stat-item">
        <h3>Class Distribution</h3>
        <ul>
          <li v-for="(count, grade) in classDistribution" :key="grade">{{ grade }}: {{ count }} students</li>
        </ul>
      </div>
    </div>

    <div class="charts">
      <div class="chart-item">
        <h3>Assignment Submission Rate</h3>
        <canvas id="assignmentChart"></canvas>
      </div>
      <div class="chart-item">
        <h3>Class Progress</h3>
        <canvas id="classProgressChart"></canvas>
      </div>
      <div class="chart-item">
        <h3>Most Popular Courses</h3>
        <canvas id="popularCoursesChart"></canvas>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js';

export default {
  props: {
    totalStudents: {
      type: Number,
      default: 120, // 默认值为 120
    },
    maleStudents: {
      type: Number,
      default: 60, // 默认值为 60
    },
    femaleStudents: {
      type: Number,
      default: 60, // 默认值为 60
    },
    classDistribution: {
      type: Object,
      default: () => ({
        'Grade 1': 30,
        'Grade 2': 30,
        'Grade 3': 30,
        'Grade 4': 30,
      }), // 默认四个年级每个30个学生
    },
    assignmentsSubmitted: {
      type: Object,
      default: () => ({
        submitted: 100,
        notSubmitted: 20,
      }), // 默认提交了100个作业，20个未提交
    },
    classProgress: {
      type: Array,
      default: () => [
        { className: 'Class 1', progress: 80 },
        { className: 'Class 2', progress: 70 },
        { className: 'Class 3', progress: 60 },
        { className: 'Class 4', progress: 50 },
      ], // 默认班级进度分别为 80%, 70%, 60%, 50%
    },
    popularCourses: {
      type: Array,
      default: () => [
        { name: 'Math', studentsCount: 40 },
        { name: 'Science', studentsCount: 35 },
        { name: 'English', studentsCount: 30 },
        { name: 'History', studentsCount: 15 },
      ], // 默认课程的学生数
    },
  },
  setup(props) {
    const maleToFemaleRatio = ref(0);
    
    onMounted(() => {
      // Calculate male-to-female ratio
      const totalGender = props.maleStudents + props.femaleStudents;
      maleToFemaleRatio.value = ((props.maleStudents / totalGender) * 100).toFixed(2);
      
      // Generate charts
      generateCharts();
    });

    const generateCharts = () => {
      const assignmentChart = new ChartJS(document.getElementById('assignmentChart'), {
        type: 'pie',
        data: {
          labels: ['Submitted', 'Not Submitted'],
          datasets: [
            {
              label: 'Assignment Submission Rate',
              data: [
                props.assignmentsSubmitted.submitted,
                props.assignmentsSubmitted.notSubmitted,
              ],
              backgroundColor: ['#4caf50', '#f44336'],
            },
          ],
        },
      });

      const classProgressChart = new ChartJS(document.getElementById('classProgressChart'), {
        type: 'bar',
        data: {
          labels: props.classProgress.map(item => item.className),
          datasets: [
            {
              label: 'Class Progress',
              data: props.classProgress.map(item => item.progress),
              backgroundColor: '#2196f3',
            },
          ],
        },
      });

      const popularCoursesChart = new ChartJS(document.getElementById('popularCoursesChart'), {
        type: 'pie',
        data: {
          labels: props.popularCourses.map(course => course.name),
          datasets: [
            {
              label: 'Popular Courses',
              data: props.popularCourses.map(course => course.studentsCount),
              backgroundColor: ['#ffeb3b', '#ff9800', '#f44336', '#9c27b0', '#3f51b5'],
            },
          ],
        },
      });
    };

    return {
      maleToFemaleRatio,
    };
  },
};
</script>

<style scoped>
.stats {
  display: flex;
  gap: 2rem;
  margin-bottom: 2rem;
}

.stat-item {
  padding: 1rem;
  border: 1px solid #ccc;
  border-radius: 8px;
  text-align: center;
  flex: 1;
}

.charts {
  display: flex;
  gap: 2rem;
}

.chart-item {
  width: 30%;
}

h1, h3 {
  font-size: 1.5rem;
}

ul {
  list-style-type: none;
  padding-left: 0;
}
</style>

