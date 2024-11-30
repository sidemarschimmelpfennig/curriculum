<?php

namespace App\Repository\Interfaces;

interface CurriculumInterface extends BaseInterface
{
	public function validateCurriculum(array $data);
	public function testAPI();

}