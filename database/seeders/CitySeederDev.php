<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;


class CitySeederDev extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $cities= [
            //Ciudad de BS AS del 1 al 7
            ['province_id'=>2, 'name'=>'CABA'],
            ['province_id'=>2, 'name'=>'CONSTITUCION'],
            ['province_id'=>2, 'name'=>'MONSERRAT'],
            ['province_id'=>2, 'name'=>'PARQUE CHAS'],
            ['province_id'=>2, 'name'=>'PATERNAL'],
            ['province_id'=>2, 'name'=>'VILLA CRESPO'],
            ['province_id'=>2, 'name'=>'VILLA ORTUZAR'],

            //BS AS provincia del 8 al 14
            ['province_id'=>6, 'name'=>'ARANO'],
            ['province_id'=>6, 'name'=>'ARTURO VATTEONE'],
            ['province_id'=>6, 'name'=>'ESTEBAN AGUSTIN GASCON'],
            ['province_id'=>6, 'name'=>'LA PALA'],
            ['province_id'=>6, 'name'=>'MAZA'],
            ['province_id'=>6, 'name'=>'rivera'],
            ['province_id'=>6, 'name'=>'VILLA MARGARITA'],

            //SANTA FE del 15 al 19
            ['province_id'=>82, 'name'=>'PIÑERO'],
            ['province_id'=>82, 'name'=>'PUEBLO ESTHER'],
            ['province_id'=>82, 'name'=>'ROSARIO'],
            ['province_id'=>82, 'name'=>'SANTA FE'],
            ['province_id'=>82, 'name'=>'SAUCE VIEJO'],

            //NEUQUEN del 20 al 22
            ['province_id'=>58, 'name'=>'NEUQUEN'],
            ['province_id'=>58, 'name'=>'PLOTTIER'],
            ['province_id'=>58, 'name'=>'SENILLOSA'],

            //RIO NEGRO del 23 al 26
            ['province_id'=>62, 'name'=>'VIEDMA'],
            ['province_id'=>62, 'name'=>'SAN CARLOS DE BARILOCHE'],
            ['province_id'=>62, 'name'=>'DARWIN'],
            ['province_id'=>62, 'name'=>'LAS GRUTAS'],

            //CHUBUT del 27 al 32
            ['province_id'=>26, 'name'=>'PLAYA UNION'],
            ['province_id'=>26, 'name'=>'RAWSON'],
            ['province_id'=>26, 'name'=>'TRELEW'],
            ['province_id'=>26, 'name'=>'ALTO RIO MAYO'],
            ['province_id'=>26, 'name'=>'LAGO FONTANA'],
            ['province_id'=>26, 'name'=>'LOS TAMARISCOS'],

            //SALTA del 33 al 37
            ['province_id'=>66, 'name'=>'EL MOLLAR'],
            ['province_id'=>66, 'name'=>'EL PALOMAR'],
            ['province_id'=>66, 'name'=>'EL TIMBO'],
            ['province_id'=>66, 'name'=>'SALTA'],
            ['province_id'=>66, 'name'=>'EL TIPAL'],

            //JUJUY del 38 al 40
            ['province_id'=>38, 'name'=>'PURMAMARCA'],
            ['province_id'=>10, 'name'=>'QUEBRADA DE JUJUY'],
            ['province_id'=>38, 'name'=>'SAN SALVADOR DE JUJUY'],

            //CHACO del 41 al 45
            ['province_id'=>22, 'name'=>'CASTELLI'],
            ['province_id'=>22, 'name'=>'EL ARENAL'],
            ['province_id'=>22, 'name'=>'EL BRASIL'],
            ['province_id'=>22, 'name'=>'EL INDIO'],
            ['province_id'=>22, 'name'=>'EL PARAISO'],

            //TUCUMAN del 46 al 52
            ['province_id'=>90, 'name'=>'SAN MIGUEL'],
            ['province_id'=>90, 'name'=>'EL CORTE'],
            ['province_id'=>90, 'name'=>'SAN JAVIER'],
            ['province_id'=>90, 'name'=>'BARRIO SAN JOSE III'],
            ['province_id'=>90, 'name'=>'COUNTRY JOCKEY CLUB'],
            ['province_id'=>90, 'name'=>'VILLA CARMELA'],
            ['province_id'=>90, 'name'=>'YERBA BUENA - MARCOS PAZ'],
        ];

        foreach($cities as $city) {
            City::create($city);
        }
    }
}
