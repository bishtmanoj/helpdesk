<?php

namespace App;

class SiteType extends Model {

    protected $primaryKey = 'type_id';
    public $timestamps = false;

    public function scopeDepartments($query) {
        return $query->where('type', 1);
    }

    public function scopeRequests($query) {
        return $query->where('type', 2);
    }

    public function scopeDevices($query) {
        return $query->where('type', 3);
    }

    public function calls($attribute) {
        return $this->hasMany(SiteCall::class, "call_{$attribute}", 'type_id');
    }

}
