<?php 
/**
 * 
 * @author: Yuri Fialho (2º Ten Fialho)
 * @since: 7/07/2017
 * 
 * ----------------------------------------------------------------------------
 * Classe responsável pelo monitoramento do processamento dos insert no banco
 * de dados
 * ----------------------------------------------------------------------------
 */
class Progresso {

	#attributes

	public static $diretorio = '/tmp/';
	public static $instance;

	private $arquivo;
	private $fullPath;

	#construct

	private function __construct($fileName = "") {
		$this->arquivo = $fileName . "procsv_tmp.tmp";
		$this->fullPath = self::$diretorio . $this->arquivo;
	}

	#funções

	public static function getInstance() {
		if(!isset(self::$instance)) {
			self::$instance = new Progresso("procsv");
		}

		return self::$instance;
	}

	public function getProgress() {
		if (is_file($this->fullPath)) {
			return file_get_contents($this->fullPath);
		} else {
			return 0;
		}
	}

	public function setProgress($in, $to) {
		if(!is_file($this->fullPath)){
			touch($this->fullPath);
		}

		file_put_contents($this->fullPath, $in . " / " .$to);
	}

	public function getDiretorio() {
		return self::$diretorio;
	}
}

?>