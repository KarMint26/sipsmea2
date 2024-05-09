<?php

use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_topsis_ternormalisasi_terbobots AS
            SELECT
                user_id,
                title,
                ABS(w1)*r1 AS tb1,
                ABS(w2)*r2 AS tb2,
                ABS(w3)*r3 AS tb3,
                ABS(w4)*r4 AS tb4,
                ABS(w5)*r5 AS tb5
            FROM v_topsis_normalisasis
            INNER JOIN users ON v_topsis_normalisasis.user_id = users.id"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_topsis_ternormalisasi_terbobots");
    }
};
