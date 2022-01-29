<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDikerjakan extends Model
{
    use HasFactory;


 	protected $guarded = ['id'];
 	
    Public function getRouteKeyName()
    {
        return 'uuid';
    }
}
