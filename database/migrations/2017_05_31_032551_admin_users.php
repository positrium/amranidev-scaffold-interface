<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Admin_users.
 *
 * @author  The scaffold-interface created at 2017-05-31 03:25:51am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AdminUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('admin_users',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('name');
        
        $table->String('mail');
        
        /**
         * Foreignkeys section
         */
        
        
        $table->timestamps();
        
        
        $table->softDeletes();
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('admin_users');
    }
}
