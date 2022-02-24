<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HomepagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('en_homepages')->insert([ 
            [
                'title' => 'en title of section 1',
                'description' =>'en description section 1',
                'link' => 'https://mpl_test_en_section_1',
            ], [
                'title' => 'en title of section 2',
                'description' =>'en description section 2',
                'link' => 'https://mpl_test_en_section_2',
            ], [
                'title' => 'en title of section 3',
                'description' =>'en description section 3',
                'link' => 'https://mpl_test_en_section_3',
            ], [
                'title' => 'en title of section 4',
                'description' =>'en description section 4',
                'link' => 'https://mpl_test_en_section_4',
            ] ] );
         DB::table('cn_homepages')->insert([ 
            [
                'title' => 'cn title of section 1',
                'description' =>'cn description section 1',
                'link' => 'https://mpl_test_cn_section_1',
            ], [
                'title' => 'cn title of section 2',
                'description' =>'cn description section 2',
                'link' => 'https://mpl_test_cn_section_2',
            ], [
                'title' => 'cn title of section 3',
                'description' =>'cn description section 3',
                'link' => 'https://mpl_test_cn_section_3',
            ], [
                'title' => 'cn title of section 4',
                'description' =>'cn description section 4',
                'link' => 'https://mpl_test_cn_section_4',
            ] ] );
         DB::table('hk_homepages')->insert([ 
            [
                'title' => 'hk title of section 1',
                'description' =>'hk description section 1',
                'link' => 'https://mpl_test_hk_section_1',
            ], [
                'title' => 'hk title of section 2',
                'description' =>'hk description section 2',
                'link' => 'https://mpl_test_hk_section_2',
            ], [
                'title' => 'hk title of section 3',
                'description' =>'hk description section 3',
                'link' => 'https://mpl_test_hk_section_3',
            ], [
                'title' => 'hk title of section 4',
                'description' =>'hk description section 4',
                'link' => 'https://mpl_test_hk_section_4',
            ] ] );
    }
}
