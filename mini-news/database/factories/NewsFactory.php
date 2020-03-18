<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use App\NewsType;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {

$news = new NewsType();

    return [
        'title' => $faker->word,
        'description' => $faker->word,
        'news_type' => 1,
        'posted_by' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
