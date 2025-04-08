<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Đặt các thuộc tính được phép gán giá trị qua mass assignment
    protected $fillable = [
        'customer_name',
        'phone',
        'address',
        'note',
        'fruit_id',
    ];

    // Nếu bảng không có các cột created_at và updated_at, bỏ qua timestamps
    public $timestamps = true;

    // Mối quan hệ với mô hình Fruit
    public function fruit()
    {
        return $this->belongsTo(Fruit::class);
    }
}

