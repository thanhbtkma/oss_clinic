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

            Schema::create('doctors', function (Blueprint $table) {
                $table->id()->primary();
                $table->bigInteger('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                $table->enum('status', ['active', 'inactive'])->default('active');
                $table->string('specialization');
                $table->bigInteger('experience')->default(0);
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
            Schema::dropIfExists('doctors');
        }
    };
