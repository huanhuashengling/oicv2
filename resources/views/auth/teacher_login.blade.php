<template>
  <div>
    <h1>Teacher Login</h1>
    <form @submit.prevent="submit">
      <div>
        <label for="username">Username</label>
        <input
          v-model="form.username"
          type="text"
          id="username"
          placeholder="Enter your username"
        />
        <span v-if="errors.username" class="error">{{ errors.username }}</span>
      </div>
      <div>
        <label for="password">Password</label>
        <input
          v-model="form.password"
          type="password"
          id="password"
          placeholder="Enter your password"
        />
        <span v-if="errors.password" class="error">{{ errors.password }}</span>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>
export default {
  props: {
    // 接收后端传递的错误信息（如果有）
    errors: Object,
  },
  data() {
    return {
      form: {
        username: '',
        password: '',
      },
      errors: {},
    };
  },
  methods: {
    async submit() {
      this.errors = {}; // 重置错误

      try {
        await this.$inertia.post(this.route('teacher.login.post'), this.form);
      } catch (e) {
        // 如果有验证错误，处理并显示
        this.errors = e.response.data.errors || {};
      }
    },
  },
};
</script>
