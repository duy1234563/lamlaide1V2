<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('customer_name');  // Thêm cột customer_name
            $table->string('phone');          // Thêm cột phone nếu chưa có
            $table->text('address');          // Thêm cột address nếu chưa có
            $table->text('note')->nullable(); // Thêm cột note nếu chưa có
        });
    }
    
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('customer_name');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('note');
        });
    }
};
