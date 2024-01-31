<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aruskas extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];
    protected $with     = ['name'];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                return  $query->where(function ($query) use ($search) {
                    $query->where('pemasukan', 'like', '%' . $search . '%')
                        ->orWhere('detail_pemasukan', 'like', '%' . $search . '%')
                        ->orWhere('pengeluaran', 'like', '%' . $search . '%')
                        ->orWhere('detail_pengeluaran', 'like', '%' . $search . '%')
                        ->orWhere('jumlah_total', 'like', '%' . $search . '%');
                });
            }
        );
        end($query);
        $query->when($filters['name'] ?? false, function ($query, $name) {
            return $query->whereHas('name', function ($query) use ($name) {
                $query->where('id_user', 'like', '%' . $name . '%');
            });
        });
    }

    public function name()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function this()
    {
        return $this->get();
    }
    public function scopetotalkas()
    {
        return $this->sum('jumlah_total');
    }
    public function scopelastarus()
    {
        return $this->this()->last();
    }
}
