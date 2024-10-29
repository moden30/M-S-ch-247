<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HinhAnhBanner extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = DB::table('banners')->select('id', 'loai_banner')->get();

        $baseImagePath = 'uploads/hinhanhbanner/';

        $imageSlides = [
            'banner_slider_1.png',
            'banner_slider_2.png',
            'banner_slider_3.jpg',
            'banner_slider_4.png',
            'banner_slider_5.png',
        ];
        $imageFooters = [
            'banner_footer_1.png',
            'banner_footer_2.png',
            'banner_footer_3.png',
            'banner_footer_4.png',
            'banner_footer_5.png',
        ];

        foreach ($banners as $banner) {
            if ($banner->loai_banner === 'slider') {
                $imageFiles = $imageSlides;
                $imageFolder = 'id_1';
            } elseif ($banner->loai_banner === 'footer') {
                $imageFiles = $imageFooters;
                $imageFolder = 'id_2';
            } else {
                continue;
            }

            foreach ($imageFiles as $fileName) {
                $imagePath = "{$baseImagePath}{$imageFolder}/{$fileName}";

                DB::table('hinh_anh_banners')->insert([
                    'banner_id' => $banner->id,
                    'hinh_anh' => $imagePath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }





}
