<?php

use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_bobot AS
            SELECT id,
                w1/(ABS(w1)+ABS(w2)+ABS(w3)+ABS(w4)+ABS(w5)) AS w1,
                w2/(ABS(w1)+ABS(w2)+ABS(w3)+ABS(w4)+ABS(w5)) AS w2,
                w3/(ABS(w1)+ABS(w2)+ABS(w3)+ABS(w4)+ABS(w5)) AS w3,
                w4/(ABS(w1)+ABS(w2)+ABS(w3)+ABS(w4)+ABS(w5)) AS w4,
                w5/(ABS(w1)+ABS(w2)+ABS(w3)+ABS(w4)+ABS(w5)) AS w5
            FROM users");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_bobot");
    }
};
