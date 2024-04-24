<?php

use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_wp_sum_preferensis AS
            SELECT id, SUM(s) AS sum
            FROM v_wp_preferensis
            GROUP BY id"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_wp_sum_preferensis");
    }
};
