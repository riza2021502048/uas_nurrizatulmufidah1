<?php

namespace App\Models;

use CodeIgniter\Model;

class obatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kd_pelajaran';
    protected $primaryKey       = 'nm_pelajaran';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['kd_pelajaran', 'nm_pelajaran', 'nilai', 'nm_ustadza'];
}
