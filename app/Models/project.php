<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class project extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        "name",
        "description",
        "status",
        "start_date",
        "end_date",
        "budget",
        "created_at",
        "updated_at",
        "deleted_at",
    ];
    //  public const STATUS_BRII = [
    //     1 => 'Start',
    //     2 => 'Current',
    //     3 => 'Finished',
    // ];
    public function project_user()
    {
        return $this->hasMany(project_user::class);
    }
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
