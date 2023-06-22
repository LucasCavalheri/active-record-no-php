<?php

function formatException(Throwable $th)
{
    var_dump("Erro no arquivo <b>{$th->getFile()}</b> na linha <b>{$th->getLine()}</b> com a mensagem: <b><i>{$th->getMessage()}</i></b>");
}