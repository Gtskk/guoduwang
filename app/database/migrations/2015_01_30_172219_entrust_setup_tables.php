<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Creates the roles table
        Schema::create('front_roles', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Creates the assigned_roles (Many-to-Many relation) table
        Schema::create('front_assigned_roles', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('members'); // assumes a members table
            $table->foreign('role_id')->references('id')->on('front_roles');
        });

        // Creates the permissions table
        Schema::create('front_permissions', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('display_name');
            $table->timestamps();
        });

        // Creates the permission_role (Many-to-Many relation) table
        Schema::create('front_permission_role', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('front_permissions'); // assumes a users table
            $table->foreign('role_id')->references('id')->on('front_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::table('front_assigned_roles', function(Blueprint $table) {
            $table->dropForeign('assigned_roles_user_id_foreign');
            $table->dropForeign('assigned_roles_role_id_foreign');
        });

        Schema::table('front_permission_role', function(Blueprint $table) {
            $table->dropForeign('permission_role_permission_id_foreign');
            $table->dropForeign('permission_role_role_id_foreign');
        });

        Schema::drop('front_assigned_roles');
        Schema::drop('front_permission_role');
        Schema::drop('front_roles');
        Schema::drop('front_permissions');
    }

}