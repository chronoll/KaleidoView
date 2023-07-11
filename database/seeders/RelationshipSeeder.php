<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relationships')->insert([
           'user_id'=>1,
           'category_id'=>4,
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        
        DB::table('relationships')->insert([
           'user_id'=>2,
           'category_id'=>1,
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        
        DB::table('relationships')->insert([
           'user_id'=>3,
           'category_id'=>1,
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('relationships')->insert([
           'user_id'=>3,
           'category_id'=>2,
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
        DB::table('relationships')->insert([
           'user_id'=>3,
           'category_id'=>5,
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
        ]);
    }
}
