<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory, SoftDeletes,InteractsWithMedia;

    protected $fillable = [
        "name",
        "description",
        "status",
        "start_date",
        "end_date",
        "budget",
        "partner_id",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public const STATUS_RADIO = [
        '1' => 'Start',
        '2' => 'Current',
        '3' => 'Finished',
    ];

    public function project_user()
    {
        return $this->hasMany(ProjectUser::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}

