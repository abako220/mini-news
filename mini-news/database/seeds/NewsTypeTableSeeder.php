<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_types')->insert([
            [
                'name' => 'Sport News',
                'created_at' => date("Y-m-d", time()),
                'updated_at' => date("Y-m-d", time())
            ],
            [
                'name' => 'Technology News',
                'created_at' => date("Y-m-d", time()),
                'updated_at' => date("Y-m-d", time())
            ],
            [
                'name' => 'Political News',
                'created_at' => date("Y-m-d", time()),
                'updated_at' => date("Y-m-d", time())
            ]
        ]);
    }
}
