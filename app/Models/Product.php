<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function createdby()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    
    public function updated_by()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
    
    public function deleted_by()
    {
        return $this->belongsTo(User::class,'deleted_by');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
