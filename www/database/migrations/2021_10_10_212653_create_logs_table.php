<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link')->nullable(false);
            $table->tinyInteger('link_type_id')->unsigned()->nullable(false);
            $table->bigInteger('customer_id')->unsigned()->nullable(false);
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('link_type_id')
                ->references('id')->on('link_types')
                ->onDelete('cascade');

            $table->index(['link', 'customer_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
