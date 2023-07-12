<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Book;

class BookSeeder extends Seeder
{
    /*
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Book $book)
    {
        $book->create([
            'title' => 'O senhor dos aneis.' ,
            'pages' => '100',
            'price' =>'30.00',
            'id_user' => '1'
        ]);

        $book->create([
            'title' => 'Como fazer amigos e influenciar pessoas.' ,
            'pages' => '200',
            'price' =>'20',
            'id_user' => '2'
        ]);

        $book->create([
            'title' => 'Homero, Iliada.' ,
            'pages' => '575',
            'price' =>'44',
            'id_user' => '3'
        ]);
    }
}
