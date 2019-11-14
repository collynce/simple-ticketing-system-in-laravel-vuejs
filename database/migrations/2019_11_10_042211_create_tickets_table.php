<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tickets')) {
            Schema::create('tickets', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('event_id')->unsigned();
                $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
                $table->integer('amount')->unsigned();
                $table->string('ticket_type');
                $table->date('available_from');
                $table->date('available_to');
                $table->double('price', 15, 2);
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('tickets');
    }
}
