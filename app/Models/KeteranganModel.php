<?php

namespace App\Models;

use CodeIgniter\Model;

class KeteranganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kd_ustadza';
    protected $primaryKey       = 'nm_ustadza';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['kd_ustadza', 'nm_ustadza', 'kd_pelajaran'];
}
