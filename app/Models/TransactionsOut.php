<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsOut extends Model
{
    protected $table="transactions_outs";
    protected $id="id";
    protected $fillable=[
        'amount',
        'sub_category_id',
        'account_id'
    ];
    use HasFactory;
}
