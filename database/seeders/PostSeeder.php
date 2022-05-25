<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $file = public_path("/Seeders/lloguer.csv");

    //import CSV function
    function import_CSV($filename, $delimiter = ','){
    if(!file_exists($filename) || !is_readable($filename))
        return false;
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false){
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false){
            if(!$header)
                $header = $row;
                else
                $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
        }

    // store returned data into array of records
    $records = import_CSV($file);

    // add each record to the posts table in DB       
    foreach ($records as $key => $record) {
    Post::create([
        'Trimestre' => $record['Trimestre'],
        'Codi_Districte' => $record['Codi_Districte'],
        'Nom_Districte' => $record['Nom_Districte'],
        'Codi_Barri' => $record['Codi_Barri'],
        'Nom_Barri' => $record['Nom_Barri'],
        'Lloguer_mitja' => $record['Lloguer_mitja'],
        'Preu' => $record['Preu'],
        
    ]);
    }
    }
}
