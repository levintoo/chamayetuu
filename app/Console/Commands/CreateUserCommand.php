<?php

namespace App\Console\Commands;

use App\Helpers\Helper;
use App\Mail\AdminDetailsMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates new superadmin';

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
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email');
        $national_id = $this->ask('national id');
        $phone = $this->ask('phone');
        $residence = $this->ask('residence');
        $dob = Carbon::now();

        $uid= Helper::IDGenerator(new User(),'user_id',4,'CH');

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 8);

        User::create([
            'name' => $name,
            'user_id' => $uid,
            'email' => $email,
            'phone' => $phone,
            'national_id' => $national_id,
            'residence' => $residence,
            'dob' => $dob,
            'status' => '1',
            'utype' => 'SUPERADMIN',
            'password' => Hash::make($password),
        ]);
        Mail::to($email)->send(new AdminDetailsMail($email, $name ,$password));
        $this->info('account created for '.$name.' mail:'.$email.' user id:'.$uid.'check your email for password');
    }
}
