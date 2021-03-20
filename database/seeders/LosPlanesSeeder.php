<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LosPlanesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id=DB::table('tipoplans')->insertGetId([
            'nombre' => 'Sin plan',
        ]);
        DB::table('planes')->insert([
            'id_tipoplan'=>$id,
            'tipo' => 0,
            'nombre' => 'Sin plan',
            'descripcion'=> 'Sin plan',
            'dias_durac'=> 0,
            'costo'=> 0.00,
            'ahorro'=>'',
            'kms_minimo'=>0,

        ]);
        $id2=DB::table('tipoplans')->insertGetId([
            'nombre' => 'Plan Inicio',
        ]);

        DB::table('planes')->insert([
            ['id_tipoplan'=>$id2,
            'tipo' => 1,
            'nombre' => 'A',
            'descripcion'=> '<ul>
                                <li>Diseño destacado</li>
                                <li>Duración 1 día</li>
                                <li>Destacado en los resultados de busqueda de la categoría</li>
                            </ul>',
            'dias_durac'=> 1,
            'costo'=> 0.90,
            'ahorro'=>'',
            'kms_minimo'=>0,],
            ['id_tipoplan'=>$id2,
            'tipo' => 2,
            'nombre' => 'B',
            'descripcion'=> '<ul>
                                <li>Diseño destacado</li>
                                <li>Duración 7 días</li>
                                <li>Destacado en los resultados de busqueda de la categoría</li>
                            </ul>',
            'dias_durac'=> 7,
            'costo'=> 4.90,
            'ahorro'=>'22% de ahorro',
            'kms_minimo'=>0,],
            ['id_tipoplan'=>$id2,
            'tipo' => 3,
            'nombre' => 'C',
            'descripcion'=> '<ul>
                                <li>Diseño destacado</li>
                                <li>Duración 14 días</li>
                                <li>Destacado en los resultados de busqueda de la categoría</li>
                            </ul>',
            'dias_durac'=> 14,
            'costo'=> 7.90,
            'ahorro'=>'37% de ahorro',
            'kms_minimo'=>0,],
        ]);

        $id3=DB::table('tipoplans')->insertGetId([
            'nombre' => 'Plan Intermedio',
        ]);
        DB::table('planes')->insert([
            ['id_tipoplan'=>$id3,
            'tipo' => 1,
            'nombre' => 'A',
            'descripcion'=> '<ul>
                                <li>Diseño destacado</li>
                                <li>Duración 1 día</li>
                                <li>Destacado en los resultados de busqueda de la categoría</li>
                                <li>Destacado a un radio máximo de 15 kms.</li>
                            </ul>',
            'dias_durac'=> 1,
            'costo'=> 1.90,
            'ahorro'=>'',
            'kms_minimo'=>15,],
            ['id_tipoplan'=>$id3,
            'tipo' => 2,
            'nombre' => 'B',
            'descripcion'=> '<ul>
                                <li>Diseño destacado</li>
                                <li>Duración 7 día</li>
                                <li>Destacado en los resultados de busqueda de la categoría</li>
                                <li>Destacado a un radio máximo de 15 kms.</li>
                            </ul>',
            'dias_durac'=> 7,
            'costo'=> 10.64,
            'ahorro'=>'20% de ahorro',
            'kms_minimo'=>15,],
            ['id_tipoplan'=>$id3,
            'tipo' => 3,
            'nombre' => 'C',
            'descripcion'=> '<ul>
                                <li>Diseño destacado</li>
                                <li>Duración 14 día</li>
                                <li>Destacado en los resultados de busqueda de la categoría</li>
                                <li>Destacado a un radio máximo de 15 kms.</li>
                            </ul>',
            'dias_durac'=> 14,
            'costo'=> 18.62,
            'ahorro'=>'30% de ahorro',
            'kms_minimo'=>15,],
        ]);

        $id4=DB::table('tipoplans')->insertGetId([
            'nombre' => 'Plan Avanzado',
        ]);
        DB::table('planes')->insert([
            ['id_tipoplan'=>$id4,
            'tipo' => 1,
            'nombre' => 'A',
            'descripcion'=> '<ul>
                                <li>Diseño destacado</li>
                                <li>Duración 1 día</li>
                                <li>Destacado en los resultados de busqueda de la categoría</li>
                                <li>Destacado a un radio máximo de 25 kms.</li>
                            </ul>',
            'dias_durac'=> 1,
            'costo'=> 2.90,
            'ahorro'=>'',
            'kms_minimo'=>25,],
            ['id_tipoplan'=>$id4,
            'tipo' => 2,
            'nombre' => 'B',
            'descripcion'=> '<ul>
                                <li>Diseño destacado</li>
                                <li>Duración 7 día</li>
                                <li>Destacado en los resultados de busqueda de la categoría</li>
                                <li>Destacado a un radio máximo de 25 kms.</li>
                            </ul>',
            'dias_durac'=> 7,
            'costo'=> 15.22,
            'ahorro'=>'25% de ahorro',
            'kms_minimo'=>25,],
            ['id_tipoplan'=>$id4,
            'tipo' => 3,
            'nombre' => 'C',
            'descripcion'=> '<ul>
                                <li>Diseño destacado</li>
                                <li>Duración 14 día</li>
                                <li>Destacado en los resultados de busqueda de la categoría</li>
                                <li>Destacado a un radio máximo de 25 kms.</li>
                            </ul>',
            'dias_durac'=> 14,
            'costo'=> 26.39,
            'ahorro'=>'35% de ahorro',
            'kms_minimo'=>25,],
        ]);
    }
}
