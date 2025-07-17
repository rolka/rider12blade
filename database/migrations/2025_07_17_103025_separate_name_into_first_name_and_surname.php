<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Add new columns first
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('name')->nullable();
            $table->string('surname')->after('first_name')->nullable();
        });
        // 2. Populate them based on the current `name`
        DB::statement('UPDATE users SET
            first_name = SUBSTRING_INDEX(name, " ", 1),
            surname = TRIM(SUBSTRING(name, LENGTH(SUBSTRING_INDEX(name, " ", 1)) + 1))
        ');
        // 3. Now drop the `name` column
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Recreate the `name` column
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->after('id')->nullable();
        });
        // 2. Recombine first_name + surname into name
        DB::statement('UPDATE users SET name = CONCAT(first_name, " ", surname)');
        // 3. Drop the separated columns
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'surname']);
        });
    }
};
