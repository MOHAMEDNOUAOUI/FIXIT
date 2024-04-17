<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameOldTableToNewTableName extends Migration
{
    public function up()
    {
        Schema::rename('metier_user', 'depanneur_metier');
    }

    public function down()
    {
        Schema::rename('depanneur_metier', 'metier_user');
    }
};
