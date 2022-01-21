<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Experience;
use App\Models\Languaje;
use App\Models\Place;
use App\Models\Role;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        Place::factory(10)->create();

        $this->command->line('Experiencies...');
        Experience::factory(4)->hasAttached(Category::factory(['title'=>'Deportes'])->create())->create();
        Experience::factory(2)->hasAttached(Category::factory(['title'=>'Arte'])->create())->create();
        Experience::factory(3)->hasAttached(Category::factory(['title'=>'Al aire libre'])->create())->create();
        Experience::factory(1)->hasAttached(Category::factory(['title'=>'Montaña'])->create())->create();

        
        $this->command->line('Comments...');
        Comment::factory(6)->create();
        
        $this->command->line('Sales...');
        Sale::factory(8)->create();
    
    }
}
