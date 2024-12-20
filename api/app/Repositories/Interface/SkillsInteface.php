<?php

namespace App\Repositories\Interface;

interface SkillsInteface extends BaseInterface
{
    public function findBySkill(int $id);
}
