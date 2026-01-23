<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Dog' => ['Max','Luna','Rocky','Toby','Kira','Bruno','Nala','Simba','Milo','Coco'],
            'Cat' => ['Michi','Sombra','Canela','Nube','Lola','Mora','Chispa','Oreo','Salem','Kiwi'],
            'Bird' => ['Paco','Lola','Piolín','Azul','Kiara','Rayo','Sol','Cielo','Nina','Tito'],
            'Fish' => ['Burbujas','Nemo','Coral','Dory','Aqua','Perla','Río','Delta','Zafiro','Lima'],
            'Reptile' => ['Rex','Iggy','Saur','Mamba','Kaa','Spike','Loki','Nova','Tera','Rango'],
            'Other' => ['Pompón','Chester','Pelusa','Miel','Trufa','Copo','Maní','Pecas','Duna','Tango'],
        ];

        foreach ($data as $species => $names) {
            foreach ($names as $i => $name) {
                Animal::create([
                    'name' => $name,
                    'species' => $species,
                    'breed' => $species === 'Dog' ? 'Mixed' : null,
                    'age' => ($i % 12),
                    'weight' => ($species === 'Fish') ? null : (5.50 + $i),
                    'color' => ['Blanco','Marrón','Negro','Gris','Dorado'][$i % 5],
                    'is_vaccinated' => ($i % 2 === 0),
                    'notes' => 'Registro de ejemplo para pruebas de paginación y agrupación.',
                ]);
            }
        }
    }
}
