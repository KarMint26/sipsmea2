<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW vbobot_views AS (
            SELECT id,
                w1/(w1+w2+w3+w4+w5) AS w1,
                w2/(w1+w2+w3+w4+w5) AS w2,
                w3/(w1+w2+w3+w4+w5) AS w3,
                w4/(w1+w2+w3+w4+w5) AS w4,
                w5/(w1+w2+w3+w4+w5) AS w5
            FROM users
        )");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS vbobot_views");
    }
};
