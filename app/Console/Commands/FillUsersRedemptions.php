<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UsersRedemptions;
use Illuminate\Console\Command;

class FillUsersRedemptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fillUsersRedemptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill the info into users_redemptions collection';

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
        $data = [];
        User::select('_id', 'name', 'firstName', 'lastName', 'email', 'status', 'telephone')
            ->with('redemptions')
            ->where('roleID', 5)
            ->chunk(2000, function ($users) use (&$data) {
                foreach ($users as $user) {
                    $status = false;
                    if (!empty($user->name)) {
                        $name = $user->name;
                    } else {
                        $name = $user->firstName . ' ' . $user->lastName;
                    }

                    if ($user->status || $user->status == 'on' || $user->status == 1) {
                        $status = true;
                    }

                    $data[] = [
                        'clientID' => $user->_id,
                        'name' => $name,
                        'email' => $user->email,
                        'phone' => $user->telephone,
                        'redemptions' => sizeof($user->redemptions),
                        'status' => $status,
                        'created_at' => now()->toDateTimeString(),
                        'updated_at' => now()->toDateTimeString(),
                    ];
                }
            });

        $chunks = array_chunk($data, 2000);
        foreach ($chunks as $chunk) {
            UsersRedemptions::insert($chunk);
        }
    }
}
