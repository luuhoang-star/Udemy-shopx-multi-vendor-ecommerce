<?php

namespace App\Models; // Xác định Order thuộc thư mục/nhóm Model

use Illuminate\Database\Eloquent\Model; // Cho Order dùng Eloquent
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Quan hệ "thuộc về"
use Illuminate\Database\Eloquent\Relations\HasMany; // Quan hệ "có nhiều"

class Order extends Model // Tạo Model Order đại diện cho bảng orders
{
    protected $casts = [
        'billing_info' => 'array', // Tự chuyển JSON thành mảng PHP
        'shipping_info' => 'array', // Tự chuyển JSON thành mảng PHP
    ];

    function user(): BelongsTo // Một Order thuộc về một User
    {
        return $this->belongsTo(User::class); // Liên kết Order với User qua user_id
    }

    function store(): BelongsTo // Một Order thuộc về một Store
    {
        return $this->belongsTo(Store::class); // Liên kết Order với Store qua store_id
    }

    function orderProducts(): HasMany // Một Order có nhiều sản phẩm
    {
        return $this->hasMany(OrderProduct::class); // Lấy các sản phẩm thuộc Order này
    }

    function orderHistory(): HasMany // Một Order có nhiều lịch sử trạng thái
    {
        return $this->hasMany(OrderStatusHistory::class); // Lấy lịch sử của Order
    }
}
