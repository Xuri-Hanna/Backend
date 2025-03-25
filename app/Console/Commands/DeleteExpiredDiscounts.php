<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Discount;
use Carbon\Carbon;

class DeleteExpiredDiscounts extends Command
{
    protected $signature = 'discounts:delete-expired';

}
