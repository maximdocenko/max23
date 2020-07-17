<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Nexmo\Laravel\Facade\Nexmo;

class SendSMS extends Command
{
    protected $signature = 'sms:send {phone}'; // регистрируем комманду

    protected $description = 'Sending sms to the users.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $user = User::where('phone', $this->argument('phone'))->first(); // получаем пользователя с введеным номером телефона

        if($user) {

            $products = $user->products; //  Список продуктов пользователя

            $total = DB::table('products')
                ->where('products.user_id', '=', $user['id'])
                ->sum('products.price'); // Общая стоисомть продуктов

            $data = 'Your product list'."\n\n";

            foreach ($products as $product) {
                $data .= 'Name: '.$product['name'].' Price: '.$product['price']."\n\n";
            }

            $data .= 'Total: '.$total."\n\n";

            Nexmo::message()->send([
                'to'   => $this->argument('phone'),
                'from' => '998935366527',
                'text' => $data
            ]); // Отправка sms

            $this->info('The sms send successfully!');


        }else{
            $this->info('There is no user with this phone number in the database'); // В случае если пользователя в базе дынных нет
        }
    }
}