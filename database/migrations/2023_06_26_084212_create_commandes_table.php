<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();

            $table->integer("nombre");

            $table->unsignedBiginteger("item_id");
            $table->foreign("item_id")->references("id")->on("items")->onDelete("cascade");

            $table->unsignedBiginteger("price_id");
            $table->foreign("price_id")->references("id")->on("prices");

            $table->unsignedBiginteger("image_id");
            $table->foreign("image_id")->references("id")->on("images");

            $table->unsignedBiginteger("categorie_id");
            $table->foreign("categorie_id")->references("id")->on("categories")->onDelete("cascade");

            $table->unsignedBiginteger("client_id");
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("cascade");

            $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
