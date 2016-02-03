<?php

use Illuminate\Database\Migrations\Migration;
use Arxmin\SchemaModel as Schema;
use Illuminate\Database\Schema\Blueprint;

class ArxminInstallTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('arxmin_options')) {
            Schema::create('arxmin_options', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('name')->unique();
                $table->text('value')->nullable();
                $table->string('type')->default('string');
                $table->string('autoload')->default('yes');
                $table->string('context')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('arxmin_users')) {
            Schema::create('arxmin_users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password', 60);
                $table->string('role')->nullable();
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('arxmin_options');
        Schema::drop('arxmin_users');
    }
}