<?php

namespace App\Repositories;

interface NewsRepositoryInterface
{
    public function getAllNews();
    public function NewsById($id);
    public function getAllCat();
    public function catById($id);
}