<?php

/*a função require() importa arquivos, porém, caso o mesmo não seja encontrado, será levantado uma exceção e a execução é finalizada. Essa é uma maneira de interrompermos a execução dos scripts caso alguma anomalia ocorra */
require __DIR__.'/vendor/autoload.php'; 

use \App\Entity\Vaga;
//use \App\Db\Pagination;

//BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_UNSAFE_RAW);

//FILTRO STATUS
$filtroStatus = filter_input(INPUT_GET, 'status', FILTER_UNSAFE_RAW);
$filtroStatus = in_array($filtroStatus,['s','n']) ? $filtroStatus : '';


//CONDIÇÃO SQL
$condicoes = [
    !empty($busca) ? 'titulo LIKE "%'.str_replace(' ','%',$busca).'%"' : null,
    !empty($filtroStatus) ? 'ativo = "'.$filtroStatus.'"' : null
];

//REMOVE POSIÇÕES VAZIAS
$condicoes = array_filter($condicoes);

//CLÁUSULA WHERE
$where = implode(' AND ',$condicoes);

//QUANTIDADE TOTAL DE VAGAS
$quantidadeVagas = Vaga::getQuantidadeVagas($where);

//PAGINAÇÃO
//$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 10);
//echo '<pre>'; print_r($obPagination); echo '</pre>'; exit;


$vagas = Vaga::getVagas($where);

/*__DIR__ O caminho do diretório onde é utilizada a constante. Se usado dentro de um include, o diretório do arquivo incluído será retornado */
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';