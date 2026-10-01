<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['username', 'full_name', 'email', 'password', 'created_at'];
    protected $useTimestamps = false;

    public function demoUser(): ?array
    {
        return $this->select('id, username, full_name, email, created_at')->orderBy('id', 'ASC')->first();
    }

    public function findForLogin(string $login): ?array
    {
        return $this->where('username', $login)->orWhere('email', $login)->first();
    }
}
