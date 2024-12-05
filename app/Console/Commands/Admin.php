<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::create([
            'name'              => 'Anik',
            'email'             => 'tajbinanik02@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('14170989@An#'),
            'remember_token'    => Str::random(10),
            'role'              => 'admin',
            'phone'             => '01729101989',
        ]);
    }
}
