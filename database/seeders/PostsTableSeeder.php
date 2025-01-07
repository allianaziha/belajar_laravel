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
            ['title'=>'Tips Cepat Pintar', 'Content'=>'Lorem Ipsum'],
            ['title'=>'Haruskah Menunda Belajar?', 'Content'=>'Lorem Ipsum'],
            ['title'=>'Membangun Visi Misi Kesuksesan', 'Content'=>'Lorem Ipsum']
        ];
        //masukan data ke database
        DB::table('posts')->insert($posts);
    }
}
