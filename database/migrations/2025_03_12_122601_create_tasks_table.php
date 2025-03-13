<?php

use App\Enums\TaskStatus;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('title');
            $orderStatusValues = array_column(TaskStatus::cases(), 'value'); // Enum dosyamızdaki value değerlerini alıyoruz
            $table->enum('status', $orderStatusValues)->default(TaskStatus::PENDING->value); // Default olarak pending kullandık
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
