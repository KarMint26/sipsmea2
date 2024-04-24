<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE OR REPLACE VIEW v_alternatifs AS
            SELECT title,
            jarak AS c1,
            rating AS c2,
            daya_tampung AS c3,
            akses_jalan AS c4,
            current_peminat AS c5,
            user_id
            FROM pkl_places
            INNER JOIN peminatans
            ON peminatans.pkl_place_id = pkl_places.id
            INNER JOIN alternatifs
            ON alternatifs.peminatan_id = peminatans.id
            INNER JOIN academic_years
            ON academic_years.id = peminatans.academic_year_id
            WHERE academic_years.start_date <= NOW()
            AND academic_years.end_date >= NOW()"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_alternatifs");
    }
};
