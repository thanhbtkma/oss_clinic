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

            Schema::create('encounters', function (Blueprint $table) {
                $table->id()->primary();
                $table->bigInteger('doctor_id')->unsigned();
                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->bigInteger('patient_id')->unsigned();
                $table->foreign('patient_id')->references('id')->on('users');
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
            Schema::dropIfExists('encounters');
        }
    };
