<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_saw_min_maxes AS
            SELECT MIN(c1) AS m1,
	            MAX(c2) AS m2,
	            MAX(c3) AS m3,
	            MAX(c4) AS m4,
	            MIN(c5) AS m5,
	            user_id
            FROM v_alternatifs
            GROUP BY user_id"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_saw_min_maxes");
    }
};
