<?php  

require_once "app/core/Database.php";
class CActiAdmi extends Database{

	private $codActAdm; 
	private $titulo;  
	private $dependencia; 
	private $tipActAdm;
	private $observaciones;  

	public function setCodActAdm( $codActAdm ){

		$this->codActAdm = $codActAdm;
	}

	public function setTitulo( $titulo ){

		$this->titulo = $titulo;
	}

	public function setDependencia( $dependencia ){

		$this->dependencia = $dependencia;
	}

	public function setTipActAdm( $tipActAdm ){

		$this->tipActAdm = $tipActAdm;
	}

	public function setObservaciones( $observaciones ){

		$this->observaciones = $observaciones;
	}


	public function getCodActAdm(  ){

		return $this->codActAdm;
	}

	public function getTitulo( ){

		return $this->titulo;
	}

	public function getDependencia(){

		return $this->dependencia = $dependencia;
	}

	public function getTipActAdm(){

		return $this->tipActAdm;
	}

	public function getObservaciones(  ){

		return $this->observaciones;
	}

	public function listarActiAdmi(){
 
		$this->conectarBD();
		$sql = 'SELECT * FROM "TActiAdmi"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

	public function crearActiAdmi(){

		$this->conectarBD();
		$sql = 'INSERT INTO "TActiAdmi"
					("codActAdm", "titulo", "observaciones","dependencia","tipActAdm")
				VALUES
					(default,:titulo,:observaciones,:dependencia,:tipActAdm)';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':titulo',$this->titulo);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
		$this->stmt->bindParam(':dependencia',$this->dependencia);
		$this->stmt->bindParam(':tipActAdm',$this->tipActAdm);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function consultarActiAdmi(){

		$this->conectarBD();
		$sql = 'SELECT * FROM "TActiAdmi" WHERE "codActAdm" = :codActAdm';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codActAdm',$this->codActAdm);
		$this->stmt->execute(); 
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}
	
	public function modificarActiAdmi(){

		$this->conectarBD();
		$sql = 'UPDATE "TActiAdmi" 
				SET 
					"titulo" = :titulo,
					"observaciones" = :observaciones,
					"dependencia" = :dependencia,
					"tipActAdm" = :tipActAdm
				WHERE 
					"codActAdm" = :codActAdm';

		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codActAdm',$this->codActAdm);
		$this->stmt->bindParam(':titulo',$this->titulo);
		$this->stmt->bindParam(':observaciones',$this->observaciones);
		$this->stmt->bindParam(':dependencia',$this->dependencia);
		$this->stmt->bindParam(':tipActAdm',$this->tipActAdm);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function buscarActiAdmi($filtro){

		$this->conectarBD();

		$sql = "SELECT * FROM \"TActiAdmi\" WHERE \"titulo\" LIKE '" . $filtro . "%' ";
		$this->stmt = $this->conn->prepare($sql);	
		$this->stmt->execute(); 
		$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return $result;
	}

	public function eliminarActiAdmi(){

		$this->conectarBD();
		$sql = 'DELETE FROM "TActiAdmi" WHERE "codActAdm" = :codActAdm';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':codActAdm',$this->codActAdm);
     	
     	$result = $this->stmt->execute();
       	$this->desconectarBD();

    	return $result;
	}

	public function listarActiAdmiDistintos(){
 
		$this->conectarBD();
		$sql = ' SELECT DISTINCT ON ("tipActAdm") "codActAdm" ,"tipActAdm" FROM "TActiAdmi" ';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}

		public function listarActiAdmiPorTipo(){
 
		$this->conectarBD();
		$sql = ' SELECT * FROM "TActiAdmi" WHERE "tipActAdm" = :tipActAdm ';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->bindParam(':tipActAdm',$this->tipActAdm);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
		$this->desconectarBD();

		return [ "cantidad" => $num_rows , "data" => $data ];
	}
}


