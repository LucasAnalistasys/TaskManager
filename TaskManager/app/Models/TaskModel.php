<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'Nome',
        'Descricao',
        'Concluida',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
