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

            Schema::create('invoice', function (Blueprint $table) {
                $table->id()->primary();
                $table->bigInteger('doctor_id')->unsigned();
                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->bigInteger('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                $table->bigInteger('total');
                $table->bigInteger('discount')->default(0);
                $table->bigInteger('payable_amount');
                $table->enum('status', ['paid', 'unpaid']);
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
            Schema::dropIfExists('invoice');
        }
    };
