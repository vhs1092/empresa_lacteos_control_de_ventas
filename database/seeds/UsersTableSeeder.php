<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $admin;

    public function run()
    {
        DB::table('users')->delete();
        $this->genUsr();
        $this->roles();
    }

    private function genUsr(){
       
        $devPwd = ' ';
        
        User::create(array(
            'name'     => 'Victor Samayoa',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make($devPwd),
            'status' => 1
        ));

        $this->command->info('User created');

        $this->admin = 'admin';

        $superAdmin = Defender::createRole($this->admin);
        $user = User::find(1);
        $user->attachRole($superAdmin);


    }

    private function roles(){

        $roles = config('app2._roles');
        foreach ($roles as $k => $v ){
            if($v['name']!=$this->admin)  //except role assigned to main user
            Defender::createRole($v['name']);
        }
    }

}
