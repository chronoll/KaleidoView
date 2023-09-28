<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name'=>'イベント',
            'category_id'=>1,
            'position'=>1,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'おすすめ',
            'category_id'=>1,
            'position'=>2,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'お気に入り',
            'category_id'=>1,
            'position'=>3,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'作りたい',
            'category_id'=>2,
            'position'=>1,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'作ってる',
            'category_id'=>2,
            'position'=>2,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'作った',
            'category_id'=>2,
            'position'=>3,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'待機中',
            'category_id'=>3,
            'position'=>1,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'勉強中',
            'category_id'=>3,
            'position'=>2,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'完了',
            'category_id'=>3,
            'position'=>3,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'その他',
            'category_id'=>4,
            'position'=>1,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'人物',
            'category_id'=>4,
            'position'=>2,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'風景',
            'category_id'=>4,
            'position'=>3,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'will',
            'category_id'=>5,
            'position'=>1,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'visiting',
            'category_id'=>5,
            'position'=>2,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
        DB::table('tags')->insert([
            'name'=>'visited',
            'category_id'=>5,
            'position'=>3,
            'created_at'=>new Datetime(),
            'updated_at'=>new Datetime(),
        ]);
    }
}
