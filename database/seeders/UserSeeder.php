<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name'=>'Hanako',
           'email'=>'Hanako@example.com',
           'password'=>Hash::make('password_1'),
           'nickname'=>'山田花子',
           'user_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689043609/icon_girl1.jpg',
           'self_introduction'=>'宜しくお願いします。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        
        DB::table('users')->insert([
           'name'=>'Taro',
           'email'=>'Taro@example.com',
           'password'=>Hash::make('password_2'),
           'nickname'=>'太郎',
           'user_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689044022/tennis_ball.jpg',
           'self_introduction'=>'みんな、こんにちは！山田太郎といいます。趣味全開の日々を送っている26歳の大学生です。写真撮影が大好きで、特に風景や旅行先での瞬間を切り取るのが得意です。食べ歩きも大好きなので、美味しいお店や料理の写真も投稿しています。また、ギターを弾くことも趣味の一つで、自作の曲も投稿していますので、ぜひ聴いてみてください！新しい友達との出会いや、共通の趣味を通じた交流にワクワクしています。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        
        DB::table('users')->insert([
           'name'=>'Mike',
           'email'=>'Mike@example.com',
           'password'=>Hash::make('password_3'),
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('users')->insert([
           'name'=>'Michika',
           'email'=>'Michika@example.com',
           'password'=>Hash::make('password_4'),
           'nickname'=>'クロタカ',
           'user_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1693125522/sunsun/lsrqceqc60uffdrijm1r.png',
           'self_introduction'=>'黒高でーす',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
    }
}
