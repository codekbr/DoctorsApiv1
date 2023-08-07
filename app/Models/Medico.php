<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{ 
    use HasFactory, SoftDeletes;
    protected $fillable = ['nome', 'especialidade', 'cidade_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'pivot'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'delete_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function pacientes(): BelongsToMany
    {
        return $this->belongsToMany(Paciente::class, 'medico_pacientes')->withTimestamps();
    }

    public static function _create($request)
    {
        $create = new self();
        $create->fill($request);
        $create->save();
        $create->refresh();
        $create->makeVisible(['created_at', 'updated_at', 'deleted_at']);
        return $create;
    }

}
