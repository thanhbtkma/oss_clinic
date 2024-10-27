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

            Schema::create('services', function (Blueprint $table) {
                $table->id()->primary();
                $table->string('name');
                $table->time('duration');
                $table->bigInteger('charges');
                $table->bigInteger('doctor_id')->unsigned();
                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->enum('status', ['active', 'inactive'])->default('active');
                $table->string('description')->nullable();
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
            Schema::dropIfExists('services');
        }
    };
