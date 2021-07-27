<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Notifications\RenewOrderNotification;
use Illuminate\Console\Command;

class renewOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:renew';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'renew orders within 10 days ';

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
        $orders = Order::selectRaw('*, TIMESTAMPDIFF( DAY,updated_at,NOW()) as time_diff')->whereRaw('TIMESTAMPDIFF( DAY,updated_at,NOW()) >= 1')->get();

        foreach ($orders as $order) {
            $order->user->notify(new RenewOrderNotification($order));
        }
    }
}
