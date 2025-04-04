<?php

use App\Models\Profile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreignId('speciality_id')->references('id')->on('specialities') ->nullable();
            $table->foreignId('speciality_id')->nullable();
            // $table->foreignId('cliente_id')->nullable()->references('id')->on('clientes')->onDelete('cascade');
            $table->string('nombre');
            $table->string('surname')->nullable();
            $table->text('direccion')->nullable();
            $table->text('description')->nullable();
            $table->string('n_doc')->nullable();
            $table->string('pais')->nullable();
            $table->string('estado')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('telhome')->nullable();
            $table->string('telmovil')->nullable();
            $table->json('redessociales')->nullable();
            $table->json('precios')->nullable();
            $table->string('avatar')->nullable();
            $table->string('rating')->nullable();
            $table->enum('status', [Profile::VERIFIED, Profile::PENDING, Profile::REJECTED])->default(Profile::PENDING);
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
        Schema::dropIfExists('profile');
    }
}
