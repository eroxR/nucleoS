<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('last_name', 50)->nullable();
			$table->integer('lv_id')->nullable();
			$table->string('group', 5)->nullable();
			$table->string('phone_number', 50)->nullable();
			$table->string('geolocation', 200)->nullable();
            $table->enum('status', ['0', '1'])->DEFAULT('1');//0=Inactive, 1=Active
            $table->unsignedBigInteger('usertype')->nullable();//tipo_usuario

            $table->foreign('usertype')->references('id')->on('usertype')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn( 'first_name',
                                'last_name',
                                'lv_id',
                                'group',
                                'phone_number',
                                'geolocation',
                                'status'.
                                'usertype');
        });
    }
};
