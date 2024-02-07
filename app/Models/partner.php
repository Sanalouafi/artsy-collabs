<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class partner extends Model implements HasMedia{

    use HasFactory, SoftDeletes,InteractsWithMedia;
    protected $fillable = [
        "name",
        "email",
        "password",
        "phone",
        "adress",
        "type",
        "created_at",
        "updated_at",
        "deleted_at",
    ];
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
