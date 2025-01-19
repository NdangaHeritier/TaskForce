<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetLimit extends Model
{
    protected $table="budget_limits";
    protected $id="id";
    protected $fillable=[
        'limit_amount',
        'sub_category_id'
    ];
    use HasFactory;
}
