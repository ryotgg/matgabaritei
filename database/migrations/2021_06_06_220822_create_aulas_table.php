<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->integer("modulo_id");
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('excerpt')->nullable();
            $table->string('slug')->unique();
            $table->integer('category_id')->nullable();
            $table->integer("order")->default(0);
            $table->boolean("publicado")->default(false);
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
        Schema::dropIfExists('aulas');
    }
}
