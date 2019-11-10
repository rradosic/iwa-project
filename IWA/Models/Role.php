<?php
namespace IWA\Models;

use IWA\DB;

class Role extends Model
{
    public const ADMIN_ROLE = 0;
    public const MOD_ROLE = 1;
    public const USER_ROLE = 2;

    protected $tableName = 'tip_korisnika';
    protected $idColumn = 'tip_id';
}
