<?php

namespace App\Services;

class CurriculumService
{
    public function send(array $fileData) {
        $fileDataPath = $request->file('file')->store('uploads', 'public');
        
    }
}