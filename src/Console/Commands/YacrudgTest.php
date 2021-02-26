<?php

namespace Swtysweater\Yacrudg\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class YacrudgTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yacrudg:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create test account for yacrudg';

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
        $user = new User;
        $user->password = Hash::make('yacrudg');
        $user->name = $this->ask('What is your name?');
        $user->email = $user->name.'@yacrudg.com';
        $user->save();
        $this->info('Created user for login: ');
        $this->info('Name: '.$user->name);
        $this->info('Email: '.$user->email);
        $this->info('Pass: yacrudg');
        $this->info('Test account for yacrudg is successfully created!');
    }
}
