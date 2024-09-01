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
//            DB::statement("ALTER TABLE microgrids MODIFY COLUMN tr_capacity double AFTER state_id");
            $table->double('tr_capacity')->after('state_id')->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('microgrids', function (Blueprint $table) {
//            DB::statement("ALTER TABLE microgrids MODIFY COLUMN tr_capacity double AFTER deleted_at");
            $table->double('tr_capacity')->after('deleted_at')->change();
        });
    }
};
