<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           'user_id'=>1,
           'name'=>'音楽',
           'category_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689046277/background_1.jpg',
           'category_explanation'=>'音楽をまとめています',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('categories')->insert([
           'user_id'=>1,
           'name'=>'料理',
           'category_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689046515/dishes_1.jpg',
           'category_explanation'=>'料理をまとめています',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('categories')->insert([
           'user_id'=>1,
           'name'=>'勉強記録',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        
        DB::table('categories')->insert([
           'user_id'=>2,
           'name'=>'写真',
           'category_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689046707/landscape_1.jpg',
           'category_explanation'=>'写真撮影は私の人生に色と魔法を与えてくれる素晴らしい趣味です。一瞬を切り取り、感動や美しさを永遠に残すことができます。光の魔法を使い、色彩と構図を織り交ぜながら、美しいコンポジションを追求しています。写真は私の心の中で語り手となり、感情や思い出を表現する窓となっています。一緒に写真の魔法に浸り、新たな世界を切り拓きましょう。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('categories')->insert([
           'user_id'=>2,
           'name'=>'カフェ巡り',
           'category_explanation'=>'カフェ巡りは私の至福の時間。香り高いコーヒーと居心地の良い雰囲気に包まれると心がリフレッシュされる。個性的なカフェを巡り、美味しいドリンクやスイーツを楽しみながら、街の魅力を発見する。写真を撮ってSNSで共有するのも楽しみの一つ。カフェで過ごす時間は心を落ち着かせ、創造性を刺激する。新たなカフェとの出会いを楽しみにしている。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
    }
}
