<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name', 200);
            $table->boolean('needs_contact');
            $table->enum('marital_status', [
            'single', 'married', 'divorced',
                'widowed', 'separated'
            ]);
            $table->integer('child_number');
            $table->boolean('deaf');
            $table->string('email')->unique();
            $table->enum('social_benefits', [
                'cadunico' ,'mcasa_mvida', 'bolsa_familia',
                'cadastro_emprego', 'cartao_alimentacao','vale_leite',
                'aposentado'
            ])->nullable();
            $table->date('birthday');
            $table->string('phone_number', 20);
            $table->enum('healthcare_plan', [
                'cartao_sus', 'posto_de_saude'
            ])->nullable();
            $table->integer('donated');
            $table->integer('received');
            $table->foreignId('housing_id')->constrained();
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
        Schema::dropIfExists('guardians');
    }
}
