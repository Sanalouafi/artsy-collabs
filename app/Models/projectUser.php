<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class projectUser extends Model implements HasMedia
{
    use HasFactory, SoftDeletes,InteractsWithMedia;
    protected $fillable = [
        "user_id",
        "project_id",
        "task",
        "payment",
        "status",
        "created_at",
        "updated_at",
        "deleted_at",
    ];
    protected $attributes = [
        'status' => 0,
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
