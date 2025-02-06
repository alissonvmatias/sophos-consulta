<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatusClientEnum : string implements HasLabel
{
    case ADIMPLENTE = 'Adimplente';
    case INADIMPLENTE = 'Inadimplente';

    public function getlabel(): ?string
    {

        return match ($this) {
            self::ADIMPLENTE => 'Adimplente',
            self::INADIMPLENTE => 'Inadimplente',
            
        };
    }
}

