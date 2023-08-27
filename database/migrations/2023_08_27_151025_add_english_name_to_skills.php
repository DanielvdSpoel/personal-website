<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (config('database.default') === 'pgsql') {
            DB::statement("ALTER TABLE skills ADD en_name VARCHAR(255) GENERATED ALWAYS AS (COALESCE(name->>'en', '')) STORED");
        } else {
            DB::statement("ALTER TABLE skills ADD COLUMN en_name VARCHAR(255) GENERATED ALWAYS AS (JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) STORED");
        }

    }
};
