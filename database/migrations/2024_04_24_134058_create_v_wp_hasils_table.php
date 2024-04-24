<?php

use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_wp_hasils AS
            SELECT v_wp_preferensis.id, title, s/sum AS hasil
            FROM v_wp_preferensis
            INNER JOIN v_wp_sum_preferensis
            ON v_wp_preferensis.id = v_wp_sum_preferensis.id
            ORDER BY hasil"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_wp_hasils");
    }
};
