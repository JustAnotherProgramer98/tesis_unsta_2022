<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $provinces = [
        ['id' => 2,'country_id'=>1, 'name' => 'CIUDAD AUTÓNOMA DE BUENOS AIRES'],
        ['id' => 6,'country_id'=>1, 'name' => 'BUENOS AIRES'],
        ['id' => 10,'country_id'=>1, 'name' => 'CATAMARCA'],
        ['id' => 14,'country_id'=>1, 'name' => 'CÓRDOBA'],
        ['id' => 22,'country_id'=>1, 'name' => 'CHACO'],
        ['id' => 26,'country_id'=>1, 'name' => 'CHUBUT'],
        ['id' => 18,'country_id'=>1, 'name' => 'CORRIENTES'],
        ['id' => 30,'country_id'=>1, 'name' => 'ENTRE RÍOS'],
        ['id' => 34,'country_id'=>1, 'name' => 'FORMOSA'],
        ['id' => 38,'country_id'=>1, 'name' => 'JUJUY'],
        ['id' => 42,'country_id'=>1, 'name' => 'LA PAMPA'],
        ['id' => 46,'country_id'=>1, 'name' => 'LA RIOJA'],
        ['id' => 50,'country_id'=>1, 'name' => 'MENDOZA'],
        ['id' => 54,'country_id'=>1, 'name' => 'MISIONES'],
        ['id' => 58,'country_id'=>1, 'name' => 'NEUQUÉN'],
        ['id' => 62,'country_id'=>1, 'name' => 'RÍO NEGRO'],
        ['id' => 66,'country_id'=>1, 'name' => 'SALTA'],
        ['id' => 70,'country_id'=>1, 'name' => 'SAN JUAN'],
        ['id' => 74,'country_id'=>1, 'name' => 'SAN LUIS'],
        ['id' => 78,'country_id'=>1, 'name' => 'SANTA CRUZ'],
        ['id' => 82,'country_id'=>1, 'name' => 'SANTA FE'],
        ['id' => 86,'country_id'=>1, 'name' => 'SANTIAGO DEL ESTERO'],
        ['id' => 90,'country_id'=>1, 'name' => 'TUCUMÁN'],
        ['id' => 94,'country_id'=>1, 'name' => 'TIERRA DEL FUEGO'],
                ];
        foreach($provinces as $provincie) {
        Province::create($provincie);
        }
    }
}

