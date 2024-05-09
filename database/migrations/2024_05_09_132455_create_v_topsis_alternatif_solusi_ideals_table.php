<?php

use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_topsis_alternatif_solusi_ideals AS
            SELECT
                v_topsis_ternormalisasi_terbobots.user_id,
                title,
                SQRT(
                    POW(ap_tb1 - tb1, 2) +
                    POW(ap_tb2 - tb2, 2) +
                    POW(ap_tb3 - tb3, 2) +
                    POW(ap_tb4 - tb4, 2) +
                    POW(ap_tb5 - tb5, 2)
                ) AS dp,
                SQRT(
                    POW(tb1 - am_tb1, 2) +
                    POW(tb2 - am_tb2, 2) +
                    POW(tb3 - am_tb3, 2) +
                    POW(tb4 - am_tb4, 2) +
                    POW(tb5 - am_tb5, 2)
                ) AS dm
            FROM v_topsis_ternormalisasi_terbobots
            INNER JOIN v_topsis_solusi_ideals ON v_topsis_ternormalisasi_terbobots.user_id = v_topsis_solusi_ideals.user_id"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_topsis_alternatif_solusi_ideals");
    }
};
