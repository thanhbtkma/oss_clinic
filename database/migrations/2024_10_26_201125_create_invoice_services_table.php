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

            Schema::create('invoice_services', function (Blueprint $table) {
                $table->id()->primary();
                $table->bigInteger('invoice_id')->unsigned();
                $table->foreign('invoice_id')->references('id')->on('invoice');
                $table->bigInteger('service_id')->unsigned();
                $table->foreign('service_id')->references('id')->on('services');
                $table->bigInteger('quantity')->default(1);
                $table->bigInteger('total');
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
            Schema::dropIfExists('invoice_services');
        }
    };
