<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_urls', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('user_id')->nullable();
			$table->string('full_url');
			$table->string('short_url');
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->timestamp('activated_on')->nullable();
			$table->timestamp('expired_on')->nullable();
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_urls');
    }
}
