<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //テーブル
    protected $table = 'contacts';
    //id
    protected $primaryKey = 'id';
    //カラム名
    protected $fillable =
    [
        'id',
        'name',
        'kana',
        'tel',
        'email',
        'body',
        'created_at'
    ];
    //1054 Unknown column 'updated_at' in 'field list'エラー対策
    public $timestamps = false ;

}