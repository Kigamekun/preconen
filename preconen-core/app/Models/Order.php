<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','kode_transaksi', 'total_price','date', 'status', 'currency', 'hasPaid', 'nama_penerima', 'alamat_penerima', 'email_penerima','provinsi_tujuan','kota_tujuan','shipping_method','shipping_price'];

    use HasFactory;
}
