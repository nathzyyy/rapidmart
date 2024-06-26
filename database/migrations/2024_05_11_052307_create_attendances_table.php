<?php

use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Leave;
use App\Models\HumanResource\Schedule;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Schedule::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Employee::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Leave::class)->nullable()->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->timestamp('check_in');
            $table->timestamp('check_out');
            $table->float('total_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};