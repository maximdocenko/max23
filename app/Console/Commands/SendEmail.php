<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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
        Mail::send('test', [], function($message) {
            $message->from('test@gmail.com');
            $message->to($this->argument('email'))->subject('Testing mails');
        });
        $this->info('The email send successfully!');
    }
}