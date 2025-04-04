<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeederUpdated extends Seeder
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
                'user_id' => 1,
                'nombre' => 'Super',
                'surname' => 'Administrador',
                'direccion' => 'Avenida Siempre Viva 742',
                'description' => 'Experto en derecho civil y comercial.',
                'pais' => 'Venezuela',
                'estado' => 'Caracas',
                'ciudad' => 'Caracas',
                'telhome' => '011-1234-5678',
                'telmovil' => '011-9876-5432',
                'n_doc' => '12300008',
                'speciality_id' => null,
                'redessociales' => null,
                'precios' => null,
                'avatar' => null,
                'rating' => null,
                'status' => 'PENDING',
            ],

            [
                'user_id' => 2,
                'nombre' => 'Admin',
                'surname' => 'Martinez',
                'direccion' => 'Avenida Siempre Viva 742',
                'description' => 'Experto en derecho civil y comercial.',
                'pais' => 'Venezuela',
                'estado' => 'Caracas',
                'ciudad' => 'Caracas',
                'telhome' => '011-1234-5678',
                'telmovil' => '011-9876-5432',
                'n_doc' => '12345600',
                'speciality_id' => null,
                'redessociales' => null,
                'precios' => null,
                'avatar' => null,
                'rating' => null,
                'status' => 'PENDING',
            ],
            [
                'user_id' => 3,
                'nombre' => 'Carlos',
                'surname' => 'Martinez',
                'direccion' => 'Avenida Siempre Viva 742',
                'description' => 'Experto en derecho civil y comercial.',
                'pais' => 'Argentina',
                'estado' => 'CABA',
                'ciudad' => 'Buenos Aires',
                'telhome' => '011-1234-5678',
                'telmovil' => '011-9876-5432',
                'n_doc' => '12345678',
                'speciality_id' => 2,
                'redessociales' => json_encode([ 
                    [
                        'icono' => 'fa fa-facebook',
                        'title' => 'facebook',
                        'url' => 'https://facebook.com/carlosmartinez',
                    ],
                    [
                        'icono' => 'fa fa-linkedin',
                        'title' => 'linkedin',
                        'url' => 'https://linkedin.com/in/carlosmartinez',
                    ]
                ]),
                'precios' => json_encode([[
                    'item_tarifa'=> 'Consulta Inicial',
                    'precio' => 150
                ]]),
                'avatar' => null,
                'rating' => null,
                'status' => 'PENDING',
            ],

            [
                'user_id' => 4,
                'nombre' => 'Ana',
                'surname' => 'Gomez',
                'direccion' => 'Calle Falsa 456',
                'description' => 'Abogada especializada en derecho laboral.',
                'pais' => 'Venezuela',
                'estado' => 'Caracas',
                'ciudad' => 'Caracas',
                'n_doc' => '12993678',
                'telhome' => '0212-1234-5678',
                'telmovil' => '0412-9876-5432',
                'speciality_id' => null,
                'redessociales' => json_encode([ 
                    [
                        'icono' => 'fa fa-twitter',
                        'title' => 'twitter',
                        'url' => 'https://twitter.com/anagomez',
                    ],
                    [
                        'icono' => 'fa fa-instagram',
                        'title' => 'instagram',
                        'url' => 'https://instagram.com/anagomez',
                    ]
                ]),
                'precios' => json_encode([[
                    'item_tarifa'=> 'Consulta Inicial',
                    'precio' => 30
                ]]),
                'avatar' => null,
                'rating' => null,
                'status' => 'PENDING',
            ],
            [
                'user_id' => 5,
                'nombre' => 'Luis',
                'surname' => 'Fernandez',
                'direccion' => 'Avenida Libertador 1234',
                'description' => 'Abogado con experiencia en derecho penal.',
                'pais' => 'Colombia',
                'estado' => 'Bogotá',
                'ciudad' => 'Bogotá',
                'n_doc' => '123342678',
                'telhome' => '0571-1234-5678',
                'telmovil' => '0571-9876-5432',
                'speciality_id' => null,
                'redessociales' => json_encode([ 
                    [
                        'icono' => 'fa fa-facebook',
                        'title' => 'facebook',
                        'url' => 'https://facebook.com/luisfernandez',
                    ],
                    [
                        'icono' => 'fa fa-linkedin',
                        'title' => 'linkedin',
                        'url' => 'https://linkedin.com/in/luisfernandez',
                    ]
                ]),
                'precios' => null,
                'avatar' => null,
                'rating' => null,
                'status' => 'PENDING',
            ],

            [
                'user_id' => 6,
                'nombre' => 'Manuel',
                'surname' => 'Fernandez',
                'direccion' => 'Avenida Libertador 12s',
                'description' => 'Persona común.',
                'pais' => 'Colombia',
                'estado' => 'Bogotá',
                'ciudad' => 'Bogotá',
                'n_doc' => '12330678',
                'telhome' => '0571-1234-5678',
                'telmovil' => '0571-9876-5432',
                'speciality_id' => null,
                'redessociales' => json_encode([ 
                    [
                        'icono' => 'fa fa-facebook',
                        'title' => 'facebook',
                        'url' => 'https://facebook.com/luisfernandez',
                    ],
                    [
                        'icono' => 'fa fa-linkedin',
                        'title' => 'linkedin',
                        'url' => 'https://linkedin.com/in/luisfernandez',
                    ]
                ]),
                'precios'=> null,
                'avatar' => null,
                'rating' => null,
                'status' => 'PENDING',
            ],
            
        ];

        DB::table('profiles')->insert($profiles);
    }
}
