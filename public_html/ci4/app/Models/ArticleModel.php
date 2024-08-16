<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'news';
	
	protected $allowedFields = ['title', 'slug', 'body'];
	
}