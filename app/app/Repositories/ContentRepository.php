<?php

namespace SheKnows\Repositories;

Interface ContentRepository
{
    public function one($id);
    public function all();
    public function search($input);
}
