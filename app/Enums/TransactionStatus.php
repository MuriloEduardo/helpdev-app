<?php

namespace App\Enums;

enum TransactionStatus: int
{
    case Pendente = 0;
    case Confirmado = 1;
}
