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

            Schema::create('observations', function (Blueprint $table) {
                $table->id()->primary();
                $table->bigInteger('encounter_id')->unsigned();
                $table->foreign('encounter_id')->references('id')->on('encounters');
                $table->bigInteger('observation');
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
            Schema::dropIfExists('observations');
        }
    };
