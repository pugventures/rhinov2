<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefaultMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable()->default(NULL);
            $table->enum('role', array('administrator'));
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamps();
        });
        
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title')->index();
            $table->text('description'); 
            $table->timestamps();
        });
        
        Schema::create('variation_attributes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title')->index();
            $table->timestamps();
        });
        
        Schema::create('variation_options', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('variation_attribute_id')->unsigned()->index();
            $table->string('title')->index();
            $table->string('swatch')->nullable()->default(NULL);
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
        Schema::dropIfExists('variation_attributes');
        Schema::dropIfExists('products');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');
    }
}
