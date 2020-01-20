<?php

namespace App\Console\Commands;

use App\Jobs\UserControlJob;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UserControl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UserControl:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aktivasyon yapmayan kullanıcıları sil';

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
//        Log::info("Kullanıcı Silindi");
//        $users = User::where("activation","!=","")->delete();
        UserControlJob::dispatch();
    }
}
