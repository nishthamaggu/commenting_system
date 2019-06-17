<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('replies')) {
            Schema::create('replies', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('author','128');
                $table->text('reply');
                $table->integer('comment_id')->nullable($value = false);
                $table->integer('parent_reply_id')->nullable($value = true);
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
        Schema::dropIfExists('replies');
    }
}
