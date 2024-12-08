<?php

namespace App\Console\Commands;

use App\Models\DonHang;
use Illuminate\Console\Command;

class CancelExpiredOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cancel-expired-orders';

    /**
     * The console command description
     * @var string
     */
    protected $description = 'Tự động hủy đơn hàng quá hạn 15p';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Lấy tất cả đơn hàng quá thời hạn và chuyển trạng thái thành 'huy'
        DonHang::query()->where('trang_thai', 'dang_xu_ly')
            ->where('expires_at', '<', now())
            ->update(['trang_thai' => 'that_bai']);
        \Log::info('Scheduler đang chạy');
    }

}
