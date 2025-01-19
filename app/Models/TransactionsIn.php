<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsIn extends Model
{
    protected $table="transactions_ins";
    protected $id="id";
    protected $fillable=[
        'amount',
        'account_id'
    ];
    use HasFactory;
}
