<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class Users extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:list';
    //protected $signature = 'users:list {id}'; //Pass Arguments

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all users from users table';

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
        $headers = ["ID", "Name", "Email"];
        $users = User::select('id','name','email')->get();
        //$users = User::select('id','name','email')->where('id',$this->argument('id'))->get(); //Pass Arguments
        $this->table($headers,$users);
    }
}
