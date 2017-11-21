<?php

namespace App;

use Auth;

class SiteCall extends Model {

    protected $primaryKey = 'call_id';

    public function department() {

        return $this->belongsTo(SiteType::class, 'call_department', 'type_id');
    }

    public function request() {

        return $this->belongsTo(SiteType::class, 'call_request', 'type_id');
    }

    public function device() {

        return $this->belongsTo(SiteType::class, 'call_device', 'type_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'call_user');
    }

    public function staff() {
        return $this->belongsTo(User::class, 'call_staff');
    }

    public function scopeFindByStatus($query, $status = 'all') {

        if ($status == 'ticket.open')
            return $query->where('call_status', 0);

        if ($status == 'closed')
            return $query->where('call_status', 1);

        return $query;
    }

    public function scopeAuthorized($query) {
        if (Auth::user()->user_role == 'user')
            return $query->where('call_user', Auth::id());
        else
            return $query;
    }

}
