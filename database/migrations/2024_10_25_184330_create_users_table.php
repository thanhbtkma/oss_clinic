<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('avatar')->nullable();
                $table->string('email')->unique();
                $table->string('full_name');
                $table->date('birth_day')->nullable();
                $table->enum('gender', ['male', 'female', 'other'])->nullable();
                $table->bigInteger('address')->nullable();
                $table->string('phone')->nullable();
                $table->enum('role', ['admin', 'doctor', 'receptionist', 'patient'])->default('patient');
                $table->timestamps();  // includes 'created_at' and 'updated_at'
                $table->softDeletes(); // includes 'deleted_at'
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('users');
        }
    };
