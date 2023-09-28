<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
           'category_id'=>1,
           'user_id'=>1,
           'title'=>'ライブレポート',
           'body'=>'ライブに行きました',
           'post_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689076923/live_1.jpg',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
           'tag_id'=>1,
        ]);
        DB::table('posts')->insert([
           'category_id'=>1,
           'user_id'=>1,
           'title'=>'雨の日に聴きたい曲集',
           'body'=>'Rain:秦 基博',
           'post_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689077491/Rain.jpg',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
           'tag_id'=>2,
        ]);
        DB::table('posts')->insert([
           'category_id'=>1,
           'user_id'=>1,
           'title'=>'お気に入りのCD',
           'body'=>'夏にいつも聴いています',
           'post_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689077674/ripslyme.jpg',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
           'tag_id'=>3,
        ]);
        DB::table('posts')->insert([
           'category_id'=>3,
           'user_id'=>1,
           'title'=>'7/11',
           'body'=>'今日は化学の課題を進めました。',
           'post_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689077918/study_1.jpg',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
           'tag_id'=>8,
        ]);
        DB::table('posts')->insert([
           'category_id'=>3,
           'user_id'=>1,
           'title'=>'7/12',
           'body'=>'今日は精選問題集にチャレンジしました。',
           'post_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689077918/study_1.jpg',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
           'tag_id'=>8,
        ]);
        DB::table('posts')->insert([
           'category_id'=>3,
           'user_id'=>1,
           'title'=>'7/13',
           'body'=>'今日は模試の復習をしました。',
           'post_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689077918/study_1.jpg',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
           'tag_id'=>9,
        ]);
        
        DB::table('posts')->insert([
           'category_id'=>4,
           'user_id'=>2,
           'title'=>'太陽の微笑みに包まれて - ヒマワリの魅力をカメラが切り取る',
           'body'=>'太陽の光に照らされ、黄金色に輝くヒマワリの一瞬を捉えました。その眩しい笑顔に魅了され、心が満たされる瞬間でした。ヒマワリは大地に根を張り、勇気と希望の象徴とされています。私はカメラを通じてその美しさを表現し、ブログに投稿することにしました。

この写真には、ヒマワリの花弁が太陽のように放射状に広がり、光を浴びて輝いています。風に揺れる姿はまるで幸せな笑顔のようで、心を温かく包み込んでくれます。ヒマワリ畑の中に身を置くと、自然の力強さと生命力を感じます。

ヒマワリは私にとって勇気と希望の象徴です。困難な時でも、ヒマワリのように太陽の光を追いかけて前に進むことが大切だと思います。この写真を通じて、多くの人々に元気や勇気を与えられたら嬉しいです。

皆さんもヒマワリの花に触れ、そのパワーを感じてみてください。大自然の中で心が浄化され、新たな希望が湧いてくることでしょう。ヒマワリの微笑みがあなたの日常を明るく照らし、勇気と希望を与えてくれますように。
ヒマワリの写真を通じて、私は大自然の美しさとその偉大さに再び感動しました。一つの花が持つ力や存在感に心を打たれます。ヒマワリの大きな花が向かう太陽に向けて伸びる姿勢は、私たちにも夢や目標を持ち、自分の力を最大限に引き出すことを教えてくれます。

この写真をブログに投稿することで、私はヒマワリの美しさやその象徴する意味を伝えたいと思っています。また、読者の方々にも勇気や希望を与えるきっかけとなればと願っています。

ヒマワリ畑で過ごした時間は、自然と調和し、心を癒す貴重なひとときでした。そこには風の音や鳥のさえずりが響き渡り、生命の息吹を感じました。ヒマワリの花が咲く場所に立つことで、私は自然と一体化し、穏やかな気持ちになりました。

ヒマワリの写真を見ると、その明るさと力強さが私を励まし、新たなチャレンジへの勇気を与えてくれます。このブログ投稿を通じて、読者の方々にも同じような感動や心の充実を届けられたらと思っています。

ヒマワリは私の心の中で特別な存在です。その花の美しさと力強さを写真に収め、言葉として伝えることは容易ではありませんが、このブログを通じて少しでもその魅力をお伝えできればと願っています。

ヒマワリの写真をブログに投稿することで、私は大自然の神秘と美しさを讃えるとともに、読者の方々にも心の豊かさと希望を届けることができるでしょう。ヒマワリの写真が皆さんの日常を明るく照らし、心に太陽のような温かさをもたらしてくれますように。

私のブログに投稿されたヒマワリの写真は、多くの人々に感動と共感を呼び起こすことを期待しています。ヒマワリはその美しさだけでなく、力強さや成長力も持っています。私たちが困難な時にも、ヒマワリのように強く立ち向かい、光を追い求めることが大切です。

この写真は、日常の中で忙しさやストレスに疲れている人々に、少しの癒しと希望を与えるかもしれません。ヒマワリの花が太陽の光に向かって咲き誇る様子は、私たちに夢や目標に向かって進む勇気を与えてくれます。

また、この写真は自然の美しさや命の尊さを思い起こさせてくれます。ヒマワリの花は一つ一つが個性を持ち、それぞれが輝きを放っています。私たちも自分自身の個性を大切にし、内なる輝きを発揮することが大切です。

このブログ投稿を通じて、読者の方々にヒマワリの美しさやその意味を伝えるだけでなく、自然の力や喜びを感じてもらえることを願っています。ヒマワリの写真が読者の方々に笑顔と勇気を届け、心の中に一縷の明るさを与えることができれば、私としては最大の喜びです。

ヒマワリの写真は、その瞬間の美しさと、私たちにもたらす感動を表現するものです。このブログを通じて、私の写真が読者の方々の心に響き、新たな発見や喜びをもたらせることを願っています。ヒマワリの花が私たちの心に太陽のような明るさをもたらし、日々の生活に活力を与えてくれますように。
ヒマワリの写真をブログに投稿することで、私は自然の力と美しさを称えると同時に、読者の方々に心の安らぎや癒しを届けることを願っています。ヒマワリはその大きな花弁と明るい黄色が魅力的で、見る者の心を温かく包み込んでくれます。

この写真を通じて、読者の方々に自然の恵みと調和を感じてもらいたいと思っています。ヒマワリの花は太陽のように明るく、周りの空間を明るく照らす存在です。私たちも自分自身の内なる光を見つけ、周囲に明るさを広げることができるはずです。

また、ヒマワリの写真は勇気や希望の象徴でもあります。ヒマワリは太陽に向かって咲き誇ることで、私たちに逆境に立ち向かう勇気を教えてくれます。その花弁が広がる姿は、私たちにも自分自身の可能性を信じ、前進する力を与えてくれます。
',
           'post_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689078150/picture_1.jpg',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
           'tag_id'=>12,
        ]);
        DB::table('posts')->insert([
           'category_id'=>5,
           'user_id'=>2,
           'title'=>'カフェの隠された魅力 - 一杯の珈琲が紡ぐ幸福なひととき',
           'body'=>'カフェの雰囲気と一杯の珈琲が私を幸福な世界へと誘います。独特な香りと豊かな味わいが心を満たし、落ち着いた空間が日常の喧騒から解放してくれます。

カフェの写真を通じて、私はその魅力と魔法を伝えたいと思っています。店内の暖かい照明や居心地の良い席、美しく盛り付けられたスイーツや料理。それらが織りなす光景は、まるで夢のような世界です。

カフェで過ごすひとときは、自分自身と向き合い、ゆったりとした時間を楽しむ貴重な機会です。珈琲の香りに包まれながら、本を読んだり、友人との楽しい会話を楽しんだりすることで、心にゆとりと充実感をもたらしてくれます。',
           'post_image'=>'https://res.cloudinary.com/dig0xnvus/image/upload/v1689078727/cafe_1.jpg',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
           'tag_id'=>14,
        ]);
    }
}
