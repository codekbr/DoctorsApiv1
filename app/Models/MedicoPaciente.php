<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicoPaciente extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['paciente_id', 'medico_id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'delete_at' => 'datetime:Y-m-d H:i:s'
    ];

    public static function _create($data)
    {
        $create = new self();
        $create->fill($data);
        $create->save();
        $create->refresh();
        $create->makeVisible(['created_at', 'updated_at', 'deleted_at']);
        return $create;
    }

}
