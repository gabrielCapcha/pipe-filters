<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model {
    //
	protected $connection = 'mysql';
	
    const TABLE_NAME     = 'sal_sales';
    const STATE_ACTIVE   = true;
    const STATE_INACTIVE = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'amount', 'customer_document',
        // Auditoria
        'flag_active','created_at','updated_at','deleted_at',
    ];
    
    public function getFillable()
    {
        return $this->fillable;
    }

    protected $casts = [
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = self::TABLE_NAME;
}
