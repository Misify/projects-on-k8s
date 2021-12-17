<?php

use App\Utils\OpenSSL;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (range(1, 1000) as $index) {
            $datas[] = [
                'name' => Str::uuid(),
                'type' => '卡牌对战',
                'icon' => '/storage/game/icons/2020_12_10/d48f73b9c5d2148e246dc5037b7b371a8456.png',
                'pay_callback' => '127.0.0.1',
                'pay_callback_debug' => '127.0.0.1',
                'key' => Str::random(16),
                'secret' => Str::random(32),
                'pub_key' => OpenSSL::getPublicKey(OpenSSL::newKey()),
                'pri_key' => OpenSSL::getPrivateKey(OpenSSL::newKey())
            ];

            DB::table('games')->insert($datas);
        }
    }
}
