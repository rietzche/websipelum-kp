<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbOrgJabtum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_org_jabtum', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('org_id');
            $table->string('nm_jabatan');
            $table->string('nm_penjabat');
            $table->timestamps();
        });

        Schema::table('tb_org_jabtum',function (Blueprint $kolom) {
            $kolom->foreign('org_id')->references('id')->on('tb_org')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_org_jabtum');
    }
}
