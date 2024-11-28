<?php

namespace App\Repository\Interfaces;

interface BaseInterface
{

	public function all();
	public function findByID(int $id);
	
}