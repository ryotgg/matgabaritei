<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('respostas', function (Blueprint $table) {
            $table->id();
            $table->char("option")->nullable();
            $table->integer("exercicio_id");
            $table->integer("user_id");
            $table->boolean("acertou");
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
        Schema::dropIfExists('respostas');
    }
}
