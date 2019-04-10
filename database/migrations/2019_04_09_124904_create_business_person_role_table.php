<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessPersonRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_person_role', function (Blueprint $table) {
            $table->unsignedBigInteger('business_id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();
        });
        Schema::table('business_person_role', function (Blueprint $table) {
            $table->primary(['business_id', 'person_id', 'role_id'], 'business_id_person_id_role_id_primary');
        });
        Schema::table('business_person_role', function (Blueprint $table) {
            $table->foreign('business_id')->references('id')->on('businesses')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('person_id')->references('id')->on('people')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_person_role', function (Blueprint $table) {
            $table->dropForeign('business_person_role_business_id_foreign');
            $table->dropForeign('business_person_role_person_id_foreign');
            $table->dropForeign('business_person_role_role_id_foreign');
        });
        Schema::table('business_person_role', function (Blueprint $table) {
            $table->dropPrimary('business_id_person_id_role_id_primary');
        });
        Schema::dropIfExists('business_person_role');
    }
}
