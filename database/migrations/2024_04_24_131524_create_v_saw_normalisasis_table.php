<?php

use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_saw_normalisasis AS
            SELECT title,
	            m1/c1 AS r1,
	            c2/m2 AS r2,
	            c3/m3 AS r3,
	            c4/m4 AS r4,
	            m5/c5 AS r5,
	            v_alternatifs.user_id
            FROM v_alternatifs
            INNER JOIN v_saw_min_maxes
            ON v_alternatifs.user_id = v_saw_min_maxes.user_id"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_saw_normalisasis");
    }
};
