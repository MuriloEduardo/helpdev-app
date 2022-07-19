<?php

namespace App\Enums;

enum PostStatus: int
{
    case Aberta = 0;
    case ConversaAceita = 1;
    case PagamentoAceito = 2;
    case PrimeiroConcluso = 3;
    case SegundoConcluso = 4;
}
