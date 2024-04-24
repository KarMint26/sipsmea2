<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_wp_preferensis AS
            SELECT id, title,
	            POWER (c1,w1) AS s1,
	            POWER (c2,w2) AS s2,
	            POWER (c3,w3) AS s3,
	            POWER (c4,w4) AS s4,
	            POWER (c5,w5) AS s5,
	            POWER (c1,w1)*
	            POWER (c2,w2)*
	            POWER (c3,w3)*
	            POWER (c4,w4)*
	            POWER (c5,w5) AS s
            FROM v_alternatifs
            INNER JOIN v_bobot
            ON v_bobot.id = v_alternatifs.user_id"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_wp_preferensis");
    }
};
