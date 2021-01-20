<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_schedules', function (Blueprint $table) {
            $table->id();
            $table->date('order_date');
            $table->foreignId('category_id')->constrained();
            $table->string('customer');
            $table->char('phone');
            $table->string('company')->nullable();
            $table->text('shipping_address');
            $table->char('confirm'); // yes, no=0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_schedules');
    }
}
