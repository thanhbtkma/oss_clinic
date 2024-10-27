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
            Schema::disableForeignKeyConstraints();

            Schema::create('appointments', function (Blueprint $table) {
                $table->id()->primary();
                $table->bigInteger('doctor_id')->unsigned();
                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->dateTime('appointment_date');
                $table->bigInteger('patient_id')->unsigned();
                $table->foreign('patient_id')->references('id')->on('users');
                $table->enum('status', ['booked', 'checked_in', 'checked_out'])->default('booked');
                $table->timestamps();  // includes 'created_at' and 'updated_at'
                $table->softDeletes(); // includes 'deleted_at'
            });

            Schema::enableForeignKeyConstraints();
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('appointments');
        }
    };
