<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $table="sub_categories";
    protected $id="id";
    protected $fillable=[
        'name',
        'expense_category_id'
    ];
    use HasFactory;
}
