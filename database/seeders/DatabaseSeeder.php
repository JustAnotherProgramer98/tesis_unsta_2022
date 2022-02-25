<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Country;
use App\Models\CouponCode;
use App\Models\Experience;
use App\Models\Languaje;
use App\Models\Place;
use App\Models\Role;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->command->line('Paises...');
        Country::factory()->create();
        $this->command->line('Provincias...');
        $this->call(ProvinceSeeder::class);
        $this->command->line('Ciudades...');
        if(\App::environment() == 'local' || \App::environment() == 'development'){
            $this->call(CitySeederDev::class);
        }else{
            $this->call(CitySeeder::class);
        }


        $this->command->line('Users...');
        User::factory(['name'=>'Santiago','email'=>'d@gmail.com','password'=>Hash::make('123'),'role_id'=>1])->create();
        User::factory(['name'=>'Facundo','email'=>'f@gmail.com','password'=>Hash::make('123'),'role_id'=>2])->create();
        User::factory(['name'=>'Marcelo','email'=>'m@gmail.com','password'=>Hash::make('123'),'role_id'=>3])->create();
        User::factory(10)->create();

        $this->command->line('Roles...');
        Role::factory(['name'=>'Admin','description'=>'Alta , baja y modificacion de datos.'])->create();
        Role::factory(['name'=>'Cliente','description'=>'Compra de experiencias para uso personal y de regalo.'])->create();
        Role::factory(['name'=>'Anfitrion','description'=>'Alta y modificacion de experiencias, venta de las mismas.'])->create();
        //3: anfitrion, 2: cliente, 1: administrador

        $this->command->line('Languajes...');
        Languaje::factory(['title'=>'Ingles'])->create();
        Languaje::factory(['title'=>'Español'])->create();
        Languaje::factory(['title'=>'Portuges'])->create();

        $this->command->line('Places...');
        Place::factory(['status'=>1])->count(10)->create();

        $this->command->line('Experiencies...');
        Experience::factory(3)->hasAttached(Category::factory(['status'=>1,'title'=>'Deportes'])->create())->create();
        Experience::factory(5)->hasAttached(Category::factory(['status'=>1,'title'=>'Surf'])->create())->create();
        Experience::factory(3)->hasAttached(Category::factory(['status'=>1,'title'=>'Ruta Gastronomica'])->create())->create();
        Experience::factory(1)->hasAttached(Category::factory(['status'=>1,'title'=>'Al aire libre'])->create())->create();
        Experience::factory(3)->hasAttached(Category::factory(['status'=>1,'title'=>'Cabalgatas'])->create())->create();
        Experience::factory(3)->hasAttached(Category::factory(['status'=>1,'title'=>'Visita guiada'])->create())->create();

        //Imagenes de las categorias
        DB::table('images')->insert(['url'=>'https://cdn.pixabay.com/photo/2014/10/14/20/24/soccer-488700_960_720.jpg','alt' => 'Seeded from DB','picturable_id' => 1,'picturable_type' => 'App\Models\Category']);
        DB::table('images')->insert(['url'=>'https://cdn.pixabay.com/photo/2016/11/19/10/30/beach-1838501_960_720.jpg','alt' => 'Seeded from DB','picturable_id' => 2,'picturable_type' => 'App\Models\Category']);
        DB::table('images')->insert(['url'=>'https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg','alt' => 'Seeded from DB','picturable_id' => 3,'picturable_type' => 'App\Models\Category']);
        DB::table('images')->insert(['url'=>'https://cdn.pixabay.com/photo/2017/07/19/18/32/cycling-2520007_960_720.jpg','alt' => 'Seeded from DB','picturable_id' => 4,'picturable_type' => 'App\Models\Category']);
        DB::table('images')->insert(['url'=>'https://cdn.pixabay.com/photo/2018/05/26/19/30/woman-3432069_960_720.jpg','alt' => 'Seeded from DB','picturable_id' => 5,'picturable_type' => 'App\Models\Category']);
        DB::table('images')->insert(['url'=>'https://cdn.pixabay.com/photo/2017/08/29/23/31/christ-bendicente-2695316_960_720.jpg','alt' => 'Seeded from DB','picturable_id' => 6,'picturable_type' => 'App\Models\Category']);

        //Imagenes de los lugares
        DB::table('images')->insert(['url'=>'https://images.pexels.com/photos/1060803/pexels-photo-1060803.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260','alt' => 'Seeded from DB','picturable_id' => 1,'picturable_type' => 'App\Models\Place']);
        DB::table('images')->insert(['url'=>'https://images.pexels.com/photos/3345082/pexels-photo-3345082.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940','alt' => 'Seeded from DB','picturable_id' => 2,'picturable_type' => 'App\Models\Place']);
        DB::table('images')->insert(['url'=>'https://images.pexels.com/photos/1684168/pexels-photo-1684168.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260','alt' => 'Seeded from DB','picturable_id' => 3,'picturable_type' => 'App\Models\Place']);
        DB::table('images')->insert(['url'=>'https://images.pexels.com/photos/3699812/pexels-photo-3699812.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260','alt' => 'Seeded from DB','picturable_id' => 4,'picturable_type' => 'App\Models\Place']);
        DB::table('images')->insert(['url'=>'https://images.pexels.com/photos/3348377/pexels-photo-3348377.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260','alt' => 'Seeded from DB','picturable_id' => 5,'picturable_type' => 'App\Models\Place']);
        DB::table('images')->insert(['url'=>'https://images.pexels.com/photos/4161812/pexels-photo-4161812.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940','alt' => 'Seeded from DB','picturable_id' => 6,'picturable_type' => 'App\Models\Place']);
        DB::table('images')->insert(['url'=>'https://images.pexels.com/photos/8043782/pexels-photo-8043782.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940','alt' => 'Seeded from DB','picturable_id' => 7,'picturable_type' => 'App\Models\Place']);
        DB::table('images')->insert(['url'=>'https://images.pexels.com/photos/6564672/pexels-photo-6564672.png?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940','alt' => 'Seeded from DB','picturable_id' => 8,'picturable_type' => 'App\Models\Place']);



        //Estado de las experiencias 2:Pendiente de aprovacion 1: Activa , 0:Inactiva
        
        $this->command->line('Comments...');
        Comment::factory(6)->create();
        
        $this->command->line('Sales...');
        Sale::factory(8)->create();

        $this->command->line('Coupon Codes...');
        CouponCode::factory(8)->create();
    
    }
}
