<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Discount;
use Carbon\Carbon;

class DeleteExpiredDiscounts extends Command
{
    protected $signature = 'discounts:delete-expired';
    protected $description = 'Delete all expired discount codes';

    public function handle()
    {
        $today = Carbon::today();
        $deleted = Discount::where('expiry_date', '<', $today)->delete();

        $this->info("$deleted expired discount(s) deleted.");
    }
}
