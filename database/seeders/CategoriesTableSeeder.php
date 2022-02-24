<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categories')->insert([ 
            [
                'name' => 'dancer',
                'description' =>'',
            ], [
                'name' => 'showgirl',
                'description' =>'',
            ], [
                'name' => 'promoter',
                'description' =>'',
            ], [
                'name' => 'model',
                'description' =>'',
            ], [
                'name' => 'dj',
                'description' =>'',
            ], [
                'name' => 'mc',
                'description' =>'',
            ] ] );
    }
}
