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
        	'nameCourse' => 'Alta costura' ,
            
        ]);

        Curso::create([
        	'nameCourse' => 'Corte y confeccion' ,
            
        ]);

        Curso::create([
        	'nameCourse' => 'Trajes y buzos' ,
            
        ]);
    }
}
