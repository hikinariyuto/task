<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['task','group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function scopeGroupSearch($query, $group_id)
    {
        if (!empty($group_id)) {
        $query->where('group_id', $group_id);
        }
    }

    public function scopeTaskSearch($query, $keyword)
    {
        if (!empty($keyword)) {
        $query->where('task', 'like', '%' . $keyword . '%');
        }
    }

}
