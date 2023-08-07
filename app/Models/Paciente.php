<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'delete_at' => 'datetime:Y-m-d H:i:s'
    ];

    protected $hidden = ['pivot'];
    protected $fillable = ['nome', 'celular', 'cpf'];

    public function medicos(): BelongsToMany
    {
        return $this->belongsToMany(Medico::class, 'medico_pacientes');
    }

    public function _update($data)
    {
        $this->fill($data);
        $this->save();
        $this->refresh();
        return $this;
    }

    public function _create($data)
    {
        $this->fill($data);
        $this->save();
        $this->refresh();
        return $this;
    }
}
