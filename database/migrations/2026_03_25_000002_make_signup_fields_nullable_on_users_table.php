<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class MakeSignupFieldsNullableOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            DB::statement('ALTER TABLE `users` MODIFY `country` VARCHAR(255) NULL');
            DB::statement('ALTER TABLE `users` MODIFY `currency` VARCHAR(255) NULL');
            DB::statement('ALTER TABLE `users` MODIFY `username` VARCHAR(255) NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement('ALTER TABLE users ALTER COLUMN country DROP NOT NULL');
            DB::statement('ALTER TABLE users ALTER COLUMN currency DROP NOT NULL');
            DB::statement('ALTER TABLE users ALTER COLUMN username DROP NOT NULL');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            DB::table('users')
                ->whereNull('username')
                ->update(['username' => DB::raw("CONCAT('user_', id)")]);

            DB::statement('ALTER TABLE `users` MODIFY `country` VARCHAR(255) NULL');
            DB::statement('ALTER TABLE `users` MODIFY `currency` VARCHAR(255) NULL');
            DB::statement('ALTER TABLE `users` MODIFY `username` VARCHAR(255) NOT NULL');
        } elseif ($driver === 'pgsql') {
            DB::statement("UPDATE users SET username = 'user_' || id WHERE username IS NULL");
            DB::statement('ALTER TABLE users ALTER COLUMN country DROP NOT NULL');
            DB::statement('ALTER TABLE users ALTER COLUMN currency DROP NOT NULL');
            DB::statement('ALTER TABLE users ALTER COLUMN username SET NOT NULL');
        }
    }
}
