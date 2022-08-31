<?PHP

namespace App\Db;

class Pagination{

    /**
     * Número máximo de registros por página
     *
     * @var integer
     */
    private $limit;

    /**
     * Quantidade total de resultados do banco
     *
     * @var integer
     */
    private $results;

    /**
     * Quantidade de páginas
     *
     * @var integer
     */
    private $pages;

    /**
     * Página atual
     *
     * @var integer
     */
    private $currentPage;

    /**
     * Construtor da Classe
     *
     * @param integer $results
     * @param integer $currentPage
     * @param integer $limit
     */
    private function __construct($results,$currentPage = 1,$limit = 10){
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    /**
     * Método para retornar a paginação
     *     
     */
    private function calculate(){
        //Calcula o total de páginas
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        //Verifica se a página atual não exece o número de páginas
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }



}