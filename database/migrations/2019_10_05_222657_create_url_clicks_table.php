<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_clicks', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_url_id');
			$table->timestamp('clicked_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

			$table->foreign('user_url_id')
				->references('id')
				->on('user_urls')
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
        Schema::dropIfExists('url_clicks');
    }
}
