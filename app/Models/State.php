<?php
namespace App\Models;

use Sushi\Sushi;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use Sushi;

    protected $guarded = [];

    protected $schema = [
        'name'      => 'string',
        'email'     => 'string',
    ];

    public function getRows()
    {
        return [
            ['name' => 1, 'email' => 'admin'],
            ['name' => 2, 'email' => 'manager'],
            ['name' => 3, 'email' => 'user'],
        ];
    }
}
