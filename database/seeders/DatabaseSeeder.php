<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Slider::create([
            'judul'=>'Test Slider',
            'gambar'=>'slider.jpg',
            'description'=>'just slider'
        ]);

        \App\Models\Banner::create([
            'judul'=>'Test Banner',
            'gambar'=>'banner.jpg'
        ]);


        \App\Models\Link::create([
            'nama'=>'Test Link',
            'link'=>'https://www.youtube.com/watch?v=STe1RMGHjl8&list=RDGMEMCMFH2exzjBeE_zAHHJOdxg&index=12',

        ]);

        \App\Models\Maps::create([
            'nama'=>'Test Maps',
            'embed_maps'=>'<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d247.68451290525238!2d106.77250140734021!3d-6.652846399999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1641787815838!5m2!1sid!2sid" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',

        ]);


        \App\Models\Agenda::create([
            'judul'=>'Test Agenda',
            'tanggal'=>now(),
            'waktu_mulai'=>now(),
            'waktu_selesai'=>now(),
            'deskripsi'=>'Test agenda',
            'lokasi'=>'kp pondok bitung rt 01 rw 02'
        ]);

        \App\Models\Category::create([
            'nama'=>'Test Category',
        ]);
        \App\Models\Berita::create([
            'judul'=>'Test Berita',
            'content'=>"test berita",
            'categories'=>1,
            'gambar'=>'berita.jpg',

        ]);
        \App\Models\Page::create([
            'title'=>'Test Page',
            'seo_title'=>"test Page",
            'content'=>"test",

        ]);


    }
}
