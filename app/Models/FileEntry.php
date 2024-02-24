<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'pessoa_id',
        'tipo_doc_cod',
        'tipo_doc',
        'filename',
        'mime',
        'path',
        'size'
    ];
}
