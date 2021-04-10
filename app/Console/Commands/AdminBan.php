<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;

class AdminBan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unban:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'un banned the emloyees';

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
        $admins = Employee::where('banned', '=', 1)->get();

        foreach ($admins as $admin) {
            $admin->update(['banned' => 0]);
        }
    }
}
