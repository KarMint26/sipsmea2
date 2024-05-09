<?php

use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_topsis_normalisasis AS
            SELECT
                user_id,
                title,
                c1/pb_c1 AS r1,
                c2/pb_c2 AS r2,
                c3/pb_c3 AS r3,
                c4/pb_c4 AS r4,
                c5/pb_c5 AS r5
            FROM v_alternatifs
            INNER JOIN v_topsis_pembagis"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_topsis_normalisasis");
    }
};
