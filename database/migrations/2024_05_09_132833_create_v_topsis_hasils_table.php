<?php

use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_topsis_hasils AS
            SELECT
                user_id,
                title,
                dm/(dm+dp) AS hasil
            FROM v_topsis_alternatif_solusi_ideals
            ORDER BY hasil"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_topsis_hasils");
    }
};
