<?php 
namespace App\Models;
use CodeIgniter\Model;

class Info extends Model
{
    protected $table = 'tbl_info';

    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
    
}