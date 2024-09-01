<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('microgrids', function (Blueprint $table) {
            $table->renameColumn('status', 'state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('microgrids', function (Blueprint $table) {
            $table->renameColumn('state', 'status');
        });
    }
};
