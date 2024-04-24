<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_saw_hasils AS
            SELECT user_id,
	            title,
	            ABS(w1)*r1 +
	            ABS(w2)*r2 +
	            ABS(w3)*r3 +
	            ABS(w4)*r4 +
	            ABS(w5)*r5 AS hasil
            FROM v_saw_normalisasis
            INNER JOIN v_bobot
            ON v_saw_normalisasis.user_id = v_bobot.id
            ORDER BY hasil"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_saw_hasils");
    }
};
