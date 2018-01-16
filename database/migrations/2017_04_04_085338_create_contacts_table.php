<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact');
            $table->integer('type_contact_id')->unsigned();
            $table->foreign('type_contact_id')
                ->references('id')
                ->on('type_contacts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('type_contacts');
    }
}
