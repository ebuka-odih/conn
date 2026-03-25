<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingNoticeAndTaxColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'notice')) {
                $table->string('notice')->nullable();
            }

            if (!Schema::hasColumn('users', 'notice_address')) {
                $table->string('notice_address')->nullable();
            }

            if (!Schema::hasColumn('users', 'tax_amount')) {
                $table->string('tax_amount')->nullable();
            }

            if (!Schema::hasColumn('users', 'tax_address')) {
                $table->string('tax_address')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [];

            foreach (['notice', 'notice_address', 'tax_amount', 'tax_address'] as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $columns[] = $column;
                }
            }

            if (!empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
}
