<?php

use App\Click;
use Illuminate\Database\Seeder;

class ClicksTableSeeder extends Seeder
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
        Click::create([
			'link_id' => 2,
			'user_id' => 1
		]);
        $timeRec = $timeRec +10;
        Click::create([
			'link_id' => 2,
			'user_id' => 1,
            'created_ad' => date('Y-m-d H:i:s', $timeRec)
        ]);
        $timeRec = $timeRec +10;
        Click::create([
			'link_id' => 3,
			'user_id' => 2,
            'created_ad' => date('Y-m-d H:i:s', $timeRec)
        ]);
        $timeRec = $timeRec +10;
        Click::create([
			'link_id' => 2,
			'user_id' => 4,
            'created_ad' => date('Y-m-d H:i:s', $timeRec)
        ]);
    }
}
