<?php

use Illuminate\Database\Seeder;
use App\Curso;

class Cursos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::create([
        	'nameCurso' => 'Alta costura' ,
            
        ]);

        Curso::create([
        	'nameCurso' => 'Corte y confeccion' ,
            
        ]);

        Curso::create([
        	'nameCurso' => 'Trajes y buzos' ,
            
        ]);
    }
}
