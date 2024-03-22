<?php

namespace App\Helpers;

class NotificationHelper
{
    public static function show($message, $type = 'success') {
        $notyf = notyf()
            ->position('x', 'right')
            ->position('y', 'bottom');
    
        if ($type === 'success') {
            $notyf->addSuccess($message);
        } else {
            $notyf->addError($message);
        }
    
        return $notyf;
    }
}

