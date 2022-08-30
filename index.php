<?php

/*a função require() importa arquivos, porém, caso o mesmo não seja encontrado, será levantado uma exceção e a execução é finalizada. Essa é uma maneira de interrompermos a execução dos scripts caso alguma anomalia ocorra */
require __DIR__.'/vendor/autoload.php'; 

use \App\Entity\Vaga;

$vagas = Vaga::getVagas();

/*__DIR__ O caminho do diretório onde é utilizada a constante. Se usado dentro de um include, o diretório do arquivo incluído será retornado */
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';