<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRank()
    {
        return 'Juara ' . $this->rank;
    }
    public function getImg()
    {
        if (in_array($this->rank, ['1', '2', '3'])) {
            return '<img src="/images/juara' . $this->rank . '.png" style="max-height: 150px;max-width: 100px;">';
        } else {
            return '<img src="/images/medal.png" style="max-height: 150px;max-width: 100px;">';
        }
    }
}
