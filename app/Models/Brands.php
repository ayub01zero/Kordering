<?php

namespace App\Models;

use Kenepa\ResourceLock\Models\Concerns\HasLocks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\trait\LocalData;
{
    
}


class Brands extends Model
{
    use HasFactory,LocalData;
    use HasLocks;

    protected $fillable = [
        'name_en', 'name_ku', 'name_ar',
        'url', 'image',
        'description_en', 'description_ku', 'description_ar'
    ];  
    

    
  
}
