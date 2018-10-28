<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(null)->commment('');
            $table->bigInteger('order_no')->nullable()->default(null)->commment('');
            $table->integer('book_id')->nullable()->default(null)->commment('书籍id');
            $table->string('book_name')->nullable()->default(null)->commment('书籍名称');
            $table->string('book_image')->nullable()->default(null)->commment('图片地址');            
            $table->decimal('book_price',20,2)->nullable()->default(null)->commment('书籍价格');            
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
