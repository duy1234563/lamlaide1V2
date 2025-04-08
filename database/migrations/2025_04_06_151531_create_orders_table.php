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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->string('phone');
        $table->text('address');
        $table->text('note')->nullable();
        $table->foreignId('fruit_id')->constrained()->onDelete('cascade'); // Nếu có mối quan hệ với bảng fruits
        $table->timestamps();  // Tạo created_at và updated_at
    });
}

public function down()
{
    Schema::dropIfExists('orders');
}

};
