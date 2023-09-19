<?php

namespace App\Models;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chapter extends Model
{
    use HasFactory;
    protected $table = 'chapters';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
    ];
    
    protected $fillable = [
        'name', 'course_id'
    ];

    public function lessons() {
        return $this->hasMany(Lesson::class)->orderBy('id', 'ASC');
    }
}
