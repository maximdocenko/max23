<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Nexmo\Laravel\Facade\Nexmo;

class SendSMS extends Command
{
    protected $signature = 'sms:send {phone}';

    protected $description = 'Sending sms to the users.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Nexmo::message()->send([
            'to'   => $this->argument('phone'),
            'from' => '998935366527',
            'text' => 'Using the facade to send a message!!!'
        ]);
        $this->info('The sms send successfully!');
    }
}