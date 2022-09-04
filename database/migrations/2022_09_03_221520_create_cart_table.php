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
        Schema::create('cart', function (Blueprint $table) {
            // $table->string('user');
            // $table->integer('image');
            
            $table->foreignId('image')->constrained('images','image_id');
            $table->foreignId('user')->constrained('users','id');
            
        });
        // Schema::table('cart',function (Blueprint $tablel){
        //     $table->foreign('')
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
};
