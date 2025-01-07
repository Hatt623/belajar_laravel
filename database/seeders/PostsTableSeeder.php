<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ['title'=>'Tips Cepat Pintar', 'content'=>'Lorem Ipsum 1'],
            ['title'=>'Haruskah Menunda Belajar?', 'content'=>'Lorem Ipsum 2'],
            ['title'=>'Membangun Visi Misi Kesuksesan', 'content'=>'Lorem Ipsum 3']
        ];

        // Masukan data ke database
        DB::table('posts')->insert($posts);
    }
}
