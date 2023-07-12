<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
           'user_id'=>1,
           'post_id'=>7,
           'content'=>'どこで撮影しましたか。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('comments')->insert([
           'user_id'=>2,
           'post_id'=>7,
           'parent_comment_id'=>1,
           'content'=>'山口です。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('comments')->insert([
           'user_id'=>1,
           'post_id'=>7,
           'parent_comment_id'=>2,
           'content'=>'とても素敵です。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('comments')->insert([
           'user_id'=>3,
           'post_id'=>7,
           'parent_comment_id'=>2,
           'content'=>'私の近所です。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('comments')->insert([
           'user_id'=>2,
           'post_id'=>7,
           'parent_comment_id'=>4,
           'content'=>'こんにちは！ありがとうございます！嬉しいですね、近所に住んでいる方とつながれるなんて素晴らしい偶然ですね。ヒマワリの写真がお近くの方に感動を届けられたことをとても嬉しく思います。

もしよろしければ、ぜひ一緒に近くのカフェでお会いしてみませんか？写真のインスピレーションやカフェ巡りのおすすめスポットについてお話しできたら嬉しいです。カフェは私にとっても大好きな場所で、新しい友人との交流も楽しみです。

また、ヒマワリの写真がお近くの方に元気や希望を与えられたのなら、本当に光栄です。私は写真を通じて人々の心に感動や癒しを届けたいと思っています。お近くの方とのつながりが新たな創作の源になることを楽しみにしています。

もしもお会いする機会がありましたら、ぜひ私に声をかけてください。素敵なカフェで美味しい珈琲を楽しみながら、お互いの趣味や興味について語り合えることを楽しみにしています。近所にお住まいの方との交流が広がることを楽しみにしています。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        
        DB::table('comments')->insert([
           'user_id'=>3,
           'post_id'=>1,
           'content'=>'私も行きました。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('comments')->insert([
           'user_id'=>2,
           'post_id'=>1,
           'content'=>'おすすめの曲はありますか',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('comments')->insert([
           'user_id'=>1,
           'post_id'=>1,
           'parent_comment_id'=>6,
           'content'=>'良かったですよね！',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('comments')->insert([
           'user_id'=>1,
           'post_id'=>1,
           'parent_comment_id'=>7,
           'content'=>'Uptown Funk です',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('comments')->insert([
           'user_id'=>1,
           'post_id'=>1,
           'parent_comment_id'=>9,
           'content'=>'一番有名な曲です。',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        
        
        
    }
}
