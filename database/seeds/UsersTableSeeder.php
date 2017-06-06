<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('123456'),
            'remember_token' => '6gYxaB3VHiznHyZm0UkO',
         ]);
        $timeRec = $timeRec +10;
        User::create([
            'name'  => 'Roman',
            'eMail' => 'info@nma.ee',
            'password' => Hash::make('qwerty'),
            'remember_token' => 'LoZNrlxT2aB386wv27js',
            'created_at' => date('Y-m-d H:i:s', $timeRec)       
        ]);
    }
}
