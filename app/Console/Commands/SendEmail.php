<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class SendEmail extends Command
{
    protected $signature = 'email:send {email}';

    protected $description = 'Sending emails to the users.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $user = User::where('email', $this->argument('email'))->first();

        if($user) {
            $products = $user->products;
            $total = DB::table('products')
                ->where('products.user_id', '=', $user['id'])
                ->sum('products.price');
            Mail::send('mail', ['products' => $products, 'total' => $total], function($message) {
                $message->from('test@gmail.com');
                $message->to($this->argument('email'))->subject('Test mail');
            });
            $this->info('The email send successfully!');

        }else{
            $this->info('There is no user with this email address in the database');
        }
    }
}