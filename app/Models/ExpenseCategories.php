<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategories extends Model
{
    protected $table="expense_categories";
    protected $id="id";
    protected $fillable=[
        'name'
    ];
    use HasFactory;
}
