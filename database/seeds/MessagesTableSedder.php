<?php

use Illuminate\Database\Seeder;
use App\Messages;
class MessagesTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Messages::create([
        	'from_id' => 1 ,
            'to_id' => 2 ,
            'content' => 'Hola, como estas' ,
        ]);

        Messages::create([
        	'from_id' => 2 ,
            'to_id' => 1 ,
            'content' => 'Bien, y tu' ,

        ]);
        
        Messages::create([
            'from_id' => 1 ,
            'to_id' => 3 ,
            'content' => 'Hola, usuario 3' ,

        ]);
        Messages::create([
            'from_id' => 3 ,
            'to_id' =>  1 ,
            'content' => 'Hola, usuario 1' ,

        ]);
        
    }
}
