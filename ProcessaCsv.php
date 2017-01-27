<?php
/**
 * 
 * @author: Yuri Fialho (2º Ten Fialho)
 * @since: 24/01/2017
 * 
 * ----------------------------------------------------------------------------
 * Classe responsável por processar arquivos CSV e salvar no banco para poste
 * riormente receber tratamento mais elaborado.
 * ----------------------------------------------------------------------------
 */
class ProcessaCsv {
	
	#atributos

	public $delimitadorColuna = ',';
	public $delimitadorTexto  = '"';
	public $linhaLida         = 0;
	public $linhaGravada      = 0;

	#funcoes

	function validarCsv($arquivo) {

		$listaErros = array();
		$file = fopen($arquivo, 'r');
		$this->linhaLida = 0;
		if($file) {
			while(!feof($file)) {
				$linha = fgetcsv($file,0,$this->delimitadorColuna,$this->delimitadorTexto);
				if(!$linha) continue;
				$retorno = $this->validarLinha($linha);
				if($retorno != -1) {
					array_push($listaErros, array_merge(array('linha'=>$this->linhaLida+1),$retorno));
				}
				$this->linhaLida++;
			}
		}
		fclose($file);
		if(count($listaErros)) {
			return $listaErros;
		} else {
			return 0;
		}
	}

	function validarLinha(&$linha) {
		#regex para validação
		$reg_numero = "/^[0-9]+$/";
		$reg_monetario = "/^((\d+\.\d+,\d+)|(\d+\.\d+)|(\d+\,\d+)|(\d+))$/";
		$reg_contra_monetrario = "/[^0-9\.\,]/";
		$reg_contacorrente = "/^[0-9]+$/";
		$reg_contra_contacorrente = "/[^0-9Xx]/";
		$reg_texto = "/^[A-Za-z 0-9]+$/";

		for ($i=0; $i <=12 ; $i++) { 
			if($i == 8) {
				$linha[$i] = preg_replace($reg_contra_contacorrente, "", $linha[$i]);
				if(preg_match($reg_contacorrente, $linha[$i]) == 0) return array('coluna' => $i+1, 'valor' => $linha[$i]);
			} elseif ($i >= 9 && $i <= 11) {
				$linha[$i] = preg_replace($reg_contra_monetrario, "", $linha[$i]);
				if(preg_match($reg_monetario, $linha[$i]) == 0) return array('coluna' => $i+1, 'valor' => $linha[$i]);
			} elseif ($i == 3 || $i == 4) {
				if(preg_match($reg_texto, $linha[$i]) == 0) return array('coluna' => $i+1, 'valor' => $linha[$i]);
			}
			else {
				if(preg_match($reg_numero, $linha[$i]) == 0) return array('coluna' => $i+1, 'valor' => $linha[$i]);
			}
		}
		
		return -1;
	}

	function gravar($arquivo) {
		#Yuri Fialho (2º Ten Fialho)
		#Confirguração abaixo colocada somente para teste, deverá ser substituido pela configuração de
		#produção
		$db = new PDO('mysql:host=localhost;dbname=processacsv;charset=utf8mb4', 'usuario', 'senha');

		$file = fopen($arquivo, 'r');
		$this->linhaLida = 0;
		if($file) {
			while(!feof($file)) {
				$linha = fgetcsv($file,0,$this->delimitadorColuna,$this->delimitadorTexto);
				if(!$linha) continue;
				
				$sql = "insert into importacao_csv values(";
        		foreach ($linha as &$value) {
        			$sql.="'".$value."',";
        		}
        		$sql = substr($sql, 0, -1);
        		$sql.=");";
				$resultado = $db->exec($sql);
        		$linhaSalva++;
			}

			$sql = "insert into controle_csv(nome_arquivo) values('".$_GET['nome_arquivo']."');";
			$db->exec($sql);
		}
		fclose($file);
		return 0;
	}

	function validarGravar($arquivo) {
		$validacao = $this->validarCsv($arquivo);

		if(!$validacao) {
			return $this->gravar($arquivo);
		} else {
			return $validacao;
		}
	}
}

?>