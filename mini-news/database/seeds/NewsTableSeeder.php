<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => 'Sport News',
                'description' => 'Man utd have gone eight (8) matches unbeaten. Liverpool are out of the champions League',
                'news_type' => 1,
	            'posted_by' => "ADMIN",
                'created_at' => date("Y-m-d", time()),
                'updated_at' => date("Y-m-d", time())
            ],

        ]);
    }
}
