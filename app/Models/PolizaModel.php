<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class PolizaModel extends Model{
    protected $table = 'polizas';
    protected $primaryKey = 'aplicacion';
    
    protected $allowedFields = [
        'poliza',
        'aplicacion',
        'a_favor',
        'desde',
        'hasta',
        'sobre',
        'anunciado',
        'lugar',
        'marca',
        'nos',
        'peso',
        'bultos',
        'contenido',
        'asegurado',
        'porcentaje',
        'observaciones',
        'embarcado_por',
        'estado',
        'create_at',
        'update_at',
        'cscvs',
        'ssc',
        'iva',
        'dde'
    ];
}