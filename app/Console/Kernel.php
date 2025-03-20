<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Đăng ký các command Artisan tùy chỉnh của bạn
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }

    /**
     * Định nghĩa các tác vụ lập lịch
     */
    protected function schedule(Schedule $schedule)
    {
        // Chạy tự động xóa mã giảm giá hết hạn hàng ngày
        $schedule->command('discounts:delete-expired')->daily();
    }
}
