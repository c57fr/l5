<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {

    //    Schema::disableForeignKeyConstraints();

    Schema::create('articles', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')
            ->unsigned();
      $table->string('title');
      $table->text('body');
      $table->timestamps();
      $table->timestamp('published_at')
            ->nullable();

      // Delete articles when user is deleted
      $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('articles', function (Blueprint $table) {
      $table->dropForeign('articles_user_id_foreign');
      $table->dropColumn('user_id');
    });

    Schema::dropIfExists('articles');

  }
}
