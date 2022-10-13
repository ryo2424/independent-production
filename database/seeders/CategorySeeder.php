<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * データベースに対するデータ設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'トップス',
        ]);
        DB::table('categories')->insert([
            'name' => 'パンツ',
        ]);
        DB::table('categories')->insert([
            'name' => 'シューズ',
        ]);
        DB::table('categories')->insert([
            'name' => 'バッグ',
        ]);
        DB::table('categories')->insert([
            'name' => '帽子',
        ]);
    }
}

