<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50); // 活动类型
            $table->string('title'); // 活动名称
            $table->text('description'); // 活动描述
            $table->text('goals'); // 活动目标
            $table->text('steps'); // 活动步骤
            $table->text('resources'); // 活动资源
            $table->integer('order_number'); // 活动顺序号
            $table->integer('estimated_duration')->nullable(); // 预计时长（分钟）
            $table->text('assessment_criteria')->nullable(); // 评估标准
            $table->string('open_strategy')->nullable(); // 开放策略
            $table->string('status', 20)->default('draft'); // 活动状态
            $table->integer('priority')->nullable(); // 优先级
            $table->text('related_links')->nullable(); // 相关链接
            $table->timestamps(); // created_at 和 updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
