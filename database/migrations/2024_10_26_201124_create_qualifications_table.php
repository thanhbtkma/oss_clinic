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

            Schema::create('qualifications', function (Blueprint $table) {
                $table->id()->primary();
                $table->string('degree');
                $table->bigInteger('Year');
                $table->bigInteger('doctor_id')->nullable()->unsigned();
                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->bigInteger('staff_id')->nullable()->unsigned();
                $table->foreign('staff_id')->references('id')->on('staff');
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
            Schema::dropIfExists('qualifications');
        }
    };
