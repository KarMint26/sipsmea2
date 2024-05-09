<?php

use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_topsis_solusi_ideals AS
            SELECT
                user_id,
                MIN(tb1) AS ap_tb1,
                MAX(tb2) AS ap_tb2,
                MAX(tb3) AS ap_tb3,
                MAX(tb4) AS ap_tb4,
                MIN(tb5) AS ap_tb5,
                MAX(tb1) AS am_tb1,
                MIN(tb2) AS am_tb2,
                MIN(tb3) AS am_tb3,
                MIN(tb4) AS am_tb4,
                MAX(tb5) AS am_tb5
            FROM v_topsis_ternormalisasi_terbobots
            GROUP BY user_id"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_topsis_solusi_ideals");
    }
};
