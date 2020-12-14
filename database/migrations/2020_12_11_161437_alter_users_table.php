<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('login', 50)->after('id');
            $table->string('surname', 50)->after('name');
            $table->timestamp('created_at')->nullable()->after('remember_token');
            $table->timestamp('updated_at')->nullable()->after('created_at');

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
            $table->dropColumn('login');
            $table->dropColumn('surname');
            $table->dropColumn('updated_at');
        });
    }
}
