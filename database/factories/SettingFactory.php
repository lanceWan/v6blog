<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        "about" => $faker->paragraphs(3, true),
        "site_name" => "Laravel 6.x Blog",
        "site_title" => "My Laravel 6.x Blog",
        "site_sub_title" => "假如我真的变成了鬼，将来，一定也会有，其他鬼杀队的成员，来砍断我的头颅。",
        "aphorism" => "Better for me",
        "aphorism_desc" => "愿你放下执着，放下不甘心，从今以后，只负责精彩自己的人生。往事不回头，未来不将就，你若盛开，清风自来。",
        "QQ" => "312621686",
        "adv_image" => "",
        "adv_title" => "点击链接加入群聊【Laravel PHP 技术交流】",
        "adv_url" => "https://jq.qq.com/?_wv=1027&k=52vtZrB",
        "github" => "https://github.com/lanceWan",
    ];
});
