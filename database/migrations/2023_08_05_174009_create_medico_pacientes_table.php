<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medico_pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('paciente_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unique(['paciente_id', 'medico_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicos', function($table) {
            $table->dropForeignKey('medico_id');
            $table->dropForeignKey('paciente_id');
            $table->dropIfExists('medico_pacientes');
        });
    }
};
