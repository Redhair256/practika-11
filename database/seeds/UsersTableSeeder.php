<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $timeRec = time();
        User::create([
            'name'  => 'Sergey',
            'eMail' => 'Redhair20@myahoo.com',
            'password' => '$2y$10$ko1e9dmsnut9tH0bxa8sTudo4s6bR6kpIu6nW13ub9l7NmukCmWjK',
            'remember_token' => '6gYxaB3VHiznHyZm0UkO',
         ]);
        /*$timeRec = $timeRec +10;
        User::create([
            'name'  => 'Sergey',
            'eMail' => 'Redhair20@mail.ru',
            'password' => '',
            'remember_token' => 'LoZNrlxT2aB386wv27js',
            'created_at' => date('Y-m-d H:i:s', $timeRec)
        */
        ]);
    }
}
