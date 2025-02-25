<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create(['name' => 'Bogota', 'dane_code' => '11001']);
        City::create(['name' => 'Medellín', 'dane_code' => '05001']);
        City::create(['name' => 'Cali', 'dane_code' => '76001']);
        City::create(['name' => 'Barranquilla', 'dane_code' => '08001']);
        City::create(['name' => 'Cartagena', 'dane_code' => '13001']);
        City::create(['name' => 'Cúcuta', 'dane_code' => '54001']);
        city::create(['name' => 'Pereira', 'dane_code' => '66001']);
        city::create(['name' => 'Bucaramanga', 'dane_code' => '68001']);
        city::create(['name' => 'Santa Marta', 'dane_code' => '47001']);
        city::create(['name' => 'Ibagué', 'dane_code' => '73001']);
        city::create(['name' => 'Soledad', 'dane_code' => '08606']);
        City::create(['name' => 'Villavicencio', 'dane_code' => '50001']);
        city::create(['name' => 'Valledupar', 'dane_code' => '20001']);
        city::create(['name' => 'Manizales', 'dane_code' => '17001']);
        city::create(['name' => 'Montería', 'dane_code' => '23001']);
        city::create(['name' => 'Armenia', 'dane_code' => '63001']);
        city::create(['name' => 'Sincelejo', 'dane_code' => '7001']);
        city::create(['name' => 'Neiva', 'dane_code' => '41001']);
        city::create(['name' => 'Pasto', 'dane_code' => '52001']);
        city::create(['name' => 'Popayán', 'dane_code' => '19001']);
        city::create(['name' => 'Tunja', 'dane_code' => '15001']);
        City::create(['name' => 'Quibdó', 'dane_code' => '27001']);
        city::create(['name' => 'San Andrés', 'dane_code' => '88001']);
        city::create(['name' => 'Leticia', 'dane_code' => '91001']);
        city::create(['name' => 'Mocoa', 'dane_code' => '86001']);
        city::create(['name' => 'Tumaco', 'dane_code' => '52045']);

    }
}
