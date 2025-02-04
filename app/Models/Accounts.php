<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $table="accounts";
    protected $id="id";
    protected $fillable=[
        'title',
        'balance',
        'type'
    ];
    use HasFactory;

    public function incomes(){
        return $this->hasMany(TransactionsIn::class);
    }
    public function expenses(){
        return $this->hasMany(TransactionsIn::class);
    }
}
