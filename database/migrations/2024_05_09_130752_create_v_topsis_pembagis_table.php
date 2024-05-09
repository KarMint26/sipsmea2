<?php

use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_topsis_pembagis AS
            SELECT
                SQRT(SUM(POW(c1,2))) AS pb_c1,
                SQRT(SUM(POW(c2,2))) AS pb_c2,
                SQRT(SUM(POW(c3,2))) AS pb_c3,
                SQRT(SUM(POW(c4,2))) AS pb_c4,
                SQRT(SUM(POW(c5,2))) AS pb_c5
            FROM v_alternatifs"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_topsis_pembagis");
    }
};
