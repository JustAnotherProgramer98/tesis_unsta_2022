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
        User::factory(['name'=>'Facundo','status'=>2,'email'=>'f@gmail.com','password'=>Hash::make('123'),'role_id'=>2])->create();
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
        
        //Category id
        /*
        1=> Deportes
        2=> Acuaticos
        3=> Gastronomia
        4=> Naturaleza y Aire libre
        5=> Arte y Cultura
        6=> Lugares Emblematicos
        */

        Category::factory(['slug'=>'deportes',                'status'=>1,'title'=>'Deportes'])                ->create();
        Category::factory(['slug'=>'acuaticos',               'status'=>1,'title'=>'Acuaticos'])               ->create();
        Category::factory(['slug'=>'gastronomia',             'status'=>1,'title'=>'Gastronomia'])             ->create();
        Category::factory(['slug'=>'naturaleza-y-aire-libre', 'status'=>1,'title'=>'Naturaleza y Aire libre']) ->create();
        Category::factory(['slug'=>'arte-y-cultura',          'status'=>1,'title'=>'Arte y Cultura'])          ->create();
        Category::factory(['slug'=>'lugares-emblematicos',    'status'=>1,'title'=>'Lugares Emblematicos'])    ->create();

        Experience::factory([
            'title'=>'Brunch y fútbol en la playa', 'slug'=>'brunch-y-fútbol-en-la-playa', 'description'=>'Una experiencia completa en las playas argentinas de la manera más tradicional',
            'title'=>'Parapente biplaza', 'slug'=>'parapente-biplaza', 'description'=>'Disfruta de las mejores vistas con mucha adrenalina',
            'title'=>'Vive la verdadera experiencia del futbol', 'slug'=>'Vive-la-verdadera-experiencia-del-futbol', 'description'=>'Descubre la verdadera pasión del futbol argentino con tus propios ojos',
        ]);
        DB::table('categories_experiences')->insert(['experience_id'=>1, 'category_id'=>1]);

        Experience::factory([
            'title'=>'Travesía en kayak', 'slug'=>'travesía-en-kayak', 'description'=>'Disfruta de una manera diferente y divertida de pasear por los distintos rios. Luego una comida de la manera más tradicional de la zona junto al rio.',
            'title'=>'Mañana de Surf', 'slug'=>'mañana-de-Surf', 'description'=>'Una Mañana de Surf En Mar Del Plata. Da tus primeros pasos en este apasionante deporte, o mejora tu técnica y sube unos escalones en tu nivel de surf!',
            'title'=>'Disfruta de un día completo navegando', 'slug'=>'disfruta-de-un-día-completo-navegando', 'description'=>'Los pasajeros recibirán instrucciones sobre las maniobras básicas de navegación para participar activamente en la experiencia o simplemente disfrutarlo.',
        ]);
        DB::table('categories_experiences')->insert(['experience_id'=>1, 'category_id'=>2]);
        
        Experience::factory([
            'title'=>'Conviértete en un chef marroquí', 'slug'=>'conviértete-en-un-chef-marroquí', 'description'=>'Mi madre y yo estaremos muy contentos de ser sus anfitriones durante esta clase de cocina, estamos ofreciendo esta experiencia desde 2018 y estamos muy orgullosos de compartir esta increíble actividad con nuestros huéspedes.',
            'title'=>'Ruta nocturna de tragos y cerveza', 'slug'=>'ruta-nocturna-de-tragos-y-cerveza', 'description'=>'Iremos de paseo por los mejores bares del lugar, donde probaremos de las mejores cervezas artesanales y los tragos más exóticos. Déjate sumergir en una de las experiencias más divertidas',
            'title'=>'El Tour Gourmet', 'slug'=>'el-Tour-Gourmet', 'description'=>'Aprenderas de la realización de los platos más conocidos de nuestra ciudad. Altamente recomiendo para todas aquellas personas que tengan ganas de aprender cosas nuevas del mundo de la gastronomia.',
        ]);
        DB::table('categories_experiences')->insert(['experience_id'=>1, 'category_id'=>3]);

        Experience::factory([
            'title'=>'Rodéate de alpacas', 'slug'=>'rodéate-de-alpacas', 'description'=>'Únete a nosotros para dar un paseo tranquilo por la costa jurásica con nuestras amables y adorables alpacas, hay muchas oportunidades fotográficas impresionantes de la impresionante costa.',
            'title'=>'A la caza de auroras boreales', 'slug'=>'a-la-caza-de-auroras-boreales', 'description'=>'Te recogeré en tu alojamiento y te llevaré directamente de la contaminación lumínica de la ciudad al lugar con la mayor probabilidad de ver auroras boreales. En caso de que esté nublado, visitamos 2-3 lugares para aumentar las posibilidades de encontrar un hueco en las nubes.',
            'title'=>'Cuidador de Manatíes por un Día', 'slug'=>'cuidador-de-Manatíes-por-un-Día', 'description'=>'Se convertirá en cuidador de manatíes en nuestro centro de rehabilitación. Aprenderá sobre el trabajo diario de nuestro personal, tendrá un recorrido de las facilidades del Centro, ayudará en la preparación de la dieta para nuestros pacientes y ayudará en su entrega.',
        ]);
        DB::table('categories_experiences')->insert(['experience_id'=>1, 'category_id'=>4]);

        Experience::factory([
            'title'=>'Sesión de fotos privada', 'slug'=>'sesión-de-fotos-privada', 'description'=>'Saltaremos directamente a nuestra encantadora sesión de fotos paseando por los increíbles lugares',
            'title'=>'Historias increíbles de Argentina en bicicleta eléctrica', 'slug'=>'historias-increíbles-de-argentina-en-bicicleta-eléctrica', 'description'=>'Envuelvete en las historia de todo un pais de la manera más divertida y entretenida posible. Tenemos todo el equipo que necesites asi que solo necesitamos de tu predisposición',
            'title'=>'El fantástico tour de Harry Potter', 'slug'=>'el-fantástico-tour-de-harry-potter', 'description'=>'Este recorrido a pie por Londres muestra los escenarios de rodaje del mago más famoso del mundo (¡ya sabes quién es!). Gran día para la familia.',
        ]);
        DB::table('categories_experiences')->insert(['experience_id'=>1, 'category_id'=>5]);

        Experience::factory([
            'title'=>'Tour por la casa historica', 'slug'=>'tour-por-la-casa-historica', 'description'=>'Uno de los lugares más pintoresco y bellos, con toda la historia de una pais. Este tour comprende desde el retiro del alojamiento como los más ricos aperitivos ',
            'title'=>'Paseo historico por las ruinas de quilmes', 'slug'=>'paseo-historico-por-las-ruinas-de-quilmes', 'description'=>'Disfruta de los restos del más extenso del asentamiento precolombino de Argentina. Incluye traslado y comidas en el lugar. ',
            'title'=>'Tour 4 Bodegas', 'slug'=>'tour-4-Bodegas', 'description'=>'Este paseo es intimo y tiene flexibilidad. Pasaremos a buscarlo por su hospedaje temprano y comenzaremos el viaje en auto privado, en el camino tomaremos Mate y nos presentaremos para comenzar el viaje por las mejores bodegas de la región.',
        ]);
        DB::table('categories_experiences')->insert(['experience_id'=>1, 'category_id'=>6]);

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
