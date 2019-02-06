<?php

use Faker\Generator as Faker;
use App\Post;
$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words($nb = 3, $asText = true)  ,
        'content' =>$faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'user_id'=> 1,#admin
    ];
});
