<?php

namespace App\Repositories;

Interface ContentRepository
{
    public function one($id);
    public function all();
    public function search($input);
}
