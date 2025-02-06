<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TypeAttendEnum : string implements HasLabel
{
    case BUDGET = 'Orçamento';
    case NF = 'Nota Fiscal';
    case DOUBTS = 'Dúvidas';
    case TRAINING = 'Treinamentos';
    case INSTALLATION = 'Instalação';
    case DIGITAL_CERTIFICATE = 'Certificado Digital';
    case TAXATION = 'Tributação';
    case BOX_CLOSING = 'Fechamento de Caixa';
    case NFCE_PDV = 'Nfce ou PDV';
    case STOCK = 'Estoque';
    case PRODUCT = 'Produto';
    case FINANCIAL = 'Financeiro';
    case FISCAL = 'Fiscal';
    case REGISTER = 'Registros';
    case ANALYZE_TAX_FILES = 'Analisar Arquivos Fiscais';
    case ADMINISTRATIVE = 'Administrativo';
    case BACKUP = 'Backup';
    case BALANCE = 'Balança';
    case COMMERCIAL = 'Comercial';
    case TEF = 'TEF';
    case PRINTER = 'Impressora';
    case E_COMMERCE = 'E-commerce';



    public function getlabel(): ?string
    {

        return $this->name;

        return match ($this) {
            self::BUDGET => 'Orçamento',
            self::NF => 'Nota Fiscal',
            self:: DOUBTS => 'Dúvidas',
            self:: TRAINING => 'Treinamentos',
            self:: INSTALLATION => 'Instalação',
            self:: DIGITAL_CERTIFICATE => 'Certificado Digital',
            self:: TAXATION => 'Tributação',
            self:: BOX_CLOSING => 'Fechamento de Caixa',
            self:: NFCE_PDV => 'Nfce ou PDV',
            self:: STOCK => 'Estoque',
            self:: PRODUCT => 'Produto',
            self:: FINANCIAL => 'Financeiro',
            self:: FISCAL => 'Fiscal',
            self:: REGISTER => 'Registros',
            self:: ANALYZE_TAX_FILES => 'Analisar Arquivos Fiscais',
            self:: ADMINISTRATIVE => 'Administrativo',
            self:: BACKUP => 'Backup',
            self:: BALANCE => 'Balança',
            self:: COMMERCIAL => 'Comercial',
            self:: TEF => 'TEF',
            self:: PRINTER => 'Impressora',
            self:: E_COMMERCE => 'E-commerce',
        };
    }
}

