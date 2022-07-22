<?php

namespace App\Enums;

enum PostStatus: int
{
    case Aberta = 0;
    case ConversaAceita = 1;
    case PagamentoAceito = 2;
}
