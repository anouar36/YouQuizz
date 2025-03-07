<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatuStafsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statu_stafs', function (Blueprint $table) {
            $table->id();
            $table->boolean('disponibilite')->default(true);
            $table->date('jour')->default(DB::raw('CURRENT_DATE'));
            $table->datetime('event_date_debut');
            $table->datetime('event_date_fin');
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
        Schema::dropIfExists('statu_stafs');
    }
}
