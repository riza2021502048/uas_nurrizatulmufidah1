<?php

namespace App\Models;

use CodeIgniter\Model;

class pasienModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'nm_siswi';
    protected $primaryKey       = 'kd_siswi';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['kd_siswi', 'nm_siswi','nilai','nm_ustadza'];
}
