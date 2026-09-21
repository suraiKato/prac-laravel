<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Currency extends Model
{
    use HasFactory, Notifiable;

    // protected $table = 'foobar'; если название таблицы не такое как у модели 

    // protected $primaryKey = 'uuid'; если нужно изменить название первичного ключа

    public $incrementing = false; // если нужно убрать инкрементирование у id, в данном случае потому что у нас id это строка

    // protected $connection; если есть несколько баз данных, можно указать подключение к ним

    protected $fillable = [ //указываем данные которые будут заполняться в бд
        'id', 'name', 'price',
        'active', 'sort',
    ];

    protected $guarded = []; // для указания полей, которые не должны заполняться в бд

    protected $hidden = [ // указание полей, которые не должны быть видны на сайте например пароль, токен и тп

    ];

    protected $casts = [ // указываем какой тип данных должно возвращать поле
        'price' => 'float',
        'active' => 'boolean',
        'sort' => 'integer',
    ];

    protected $dates = [ // если есть какие то даты (помимо created_at, updated_at) можно написать их сюда, чтобы они стали в формате объекта

    ];

    


}
