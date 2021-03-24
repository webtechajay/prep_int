<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $data = DB::Select("SELECT * FROM New.users Where email='rathodajay60@gmail.com';");
                    foreach ($data as $user) {
                    $title="User Registration";
                    $message = "Thank you for Joining With Cronjob.";
                    // $email = $request->email;
                    $message_data = ["message" => $message, "email"=> $user->email];
                    Mail::send('thank_you_mail', ['title' => $title, 'message_data' => $message_data], function ($message) use($message_data)
                    {
                        $message->from('rathodajay60@gmail.com');
                        $message->to($message_data['email'])->subject('Thank you for Joining With Cronjob.');
                    });
            }
    }
}
