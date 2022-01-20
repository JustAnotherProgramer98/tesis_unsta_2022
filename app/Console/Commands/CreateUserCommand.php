<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user, with a given name, email and password';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = Hash::make($this->argument('password'));

        if ($this->confirm('This will create a new user , wtih email: "'.$email.'" with the password you provide , do you want to continue ,"'.$name.'" ?')) {
            User::create([
                'name' =>$name,
                'email'=>$email,
                'password'=>$password,
                'gender'=>'Not defined',
                'phone'=>'11-111-1111',
                'address'=>'Not Defined',
                'city'=>'Not Defined',
                'province'=>'Not defined',
                'country'=>'Argentina',
                'picture'=>'admin.png',
                'role_id'=>1,
                'state'=>0,
                'verified'=>1
            ]);
        }
        $this->info('User successfully created with Email: '.$email.", and password gived");
    }
}
