<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translation', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->text('en_translate')->nullable();
            $table->text('ru_translate')->nullable();
            $table->text('kz_translate')->nullable();
            $table->text('uz_translate')->nullable();
            $table->text('oz_translate')->nullable();
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
        Schema::dropIfExists('table_translation');
    }
}
