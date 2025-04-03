<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            [
                'user_id' => 3, // Assuming a user with ID 1 exists
                'nombre' => 'Juan',
                'surname' => 'Pérez',
                'direccion' => 'Calle Falsa 123',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas
              consequatur laboriosam itaque illum ut similique, impedit ratione
              veniam voluptate asperiores dolorem, a, perferendis voluptatibus
              cupiditate? Molestiae iure accusamus hic iste',
                'pais' => 'Argentina',
                'estado' => 'Buenos Aires',
                'ciudad' => 'Buenos Aires',
                'telhome' => '011-1234-5678',
                'telmovil' => '011-9876-5432',
                'speciality_id' => 2,
                'redessociales' => json_encode([ 
                    [
                        'icono' => 'fa fa-facebook',
                        'title' => 'facebook',
                        'url' => 'https://facebook.com/juanperez',
                    ],
                    [
                        'icono' => 'fa fa-instagram',
                        'title' => 'instagram',
                        'url' => 'https://instagram.com/juanperez',
                    ]
                ]),
                'precios' => json_encode([[
                    'item_tarifa'=> 'Hoja Carta',
                    'precio' => 100
                ],
                [
                    'item_tarifa'=> 'Hoja A4',
                    'precio' => 200
                ]]),
                'avatar' => null,
                'rating' => null,
                'status' => 'PENDING',
            ],

            [
                'user_id' => 4, // Assuming a user with ID 1 exists
                'nombre' => 'Maria',
                'surname' => 'Gonzales',
                'direccion' => 'Calle Falsa 123',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas
              consequatur laboriosam itaque illum ut similique, impedit ratione
              veniam voluptate asperiores dolorem, a, perferendis voluptatibus
              cupiditate? Molestiae iure accusamus hic iste',
                'pais' => 'Venezuela',
                'estado' => 'Buenos Aires',
                'ciudad' => 'Buenos Aires',
                'telhome' => '011-1234-5678',
                'telmovil' => '011-9876-5432',
                'speciality_id' => 3,
                'redessociales' => json_encode([ 
                    [
                        'icono' => 'fa fa-facebook',
                        'title' => 'facebook',
                        'url' => 'https://facebook.com/juanperez',
                    ],
                    [
                        'icono' => 'fa fa-instagram',
                        'title' => 'instagram',
                        'url' => 'https://instagram.com/juanperez',
                    ]
                ]),
                'precios' => json_encode([[
                    'item_tarifa'=> 'Hoja Carta',
                    'precio' => 100
                ],
                [
                    'item_tarifa'=> 'Hoja A4',
                    'precio' => 200
                ]]),
                'avatar' => null,
                'rating' => null,
                'status' => 'PENDING',
            ],
            // Additional profiles can be added here
        ];

        DB::table('profiles')->insert($profiles);
    }
}
