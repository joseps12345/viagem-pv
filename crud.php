<?php

class crud
{
 	private $db;
 
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
 
	public function insereViagem($array)
	{
		try
		{
			$query = $this->db->prepare("INSERT INTO viagem(organizadores,data_ida,data_volta,ponto_saida,horario_disponivel) VALUES(:organizadores, :data_ida, :data_volta, :ponto_saida, :horario_disponivel)");
			$query->bindparam(":organizadores",$array['organizadores']);
			$query->bindparam(":data_ida",$array['data_ida']);
			$query->bindparam(":data_volta",$array['data_volta']);
			$query->bindparam(":ponto_saida",$array['ponto_saida']);
			$query->bindparam(":horario_disponivel",$array['horario_disponivel']);		
			$query->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
			return false;
		}
	
	}
	 
	public function idUltimaViagem()
	{
		$query = $this->db->prepare("SELECT id_viagem FROM viagem ORDER BY id_viagem desc");
		$query->execute();
		$id=$query->fetch(PDO::FETCH_ASSOC);
		$id = $id['id_viagem'];
		return $id;
	}
	
	public function dadosViagem($id)
	{
		$query = $this->db->prepare("SELECT * FROM viagem where id_viagem = :id");
		$query->bindparam(":id",$id);
		$query->execute();
		$dados=$query->fetch(PDO::FETCH_ASSOC);
		
		$parts = explode('-', $dados['data_ida']);
		$dados['data_ida'] = "$parts[2]/$parts[1]/$parts[0]";
		
		$parts = explode('-', $dados['data_volta']);
		$dados['data_volta'] = "$parts[2]/$parts[1]/$parts[0]";
	
		return $dados;
	}	
 
	public function addParticipante($array)
	{
		try
		{
			$query = $this->db->prepare("INSERT INTO participantes(nome,opcao,id_viagem,hora,qualquer,local_saida) VALUES(:nome, :opcao, :id_viagem, :hora, :qualquer, :local_saida)");
			$query->bindparam(":nome",$array['nome']);
			$query->bindparam(":opcao",$array['opcao']);
			//$query->bindparam(":ida",$array['ida']);
			//$query->bindparam(":volta",$array['volta']);
			$query->bindparam(":id_viagem",$array['id_viagem']);
			$query->bindparam(":hora",$array['hora']);
			$query->bindparam(":qualquer",$array['qualquer']);
			$query->bindparam(":local_saida",$array['local_saida']);
			$query->execute();
		return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
			return false;
		}
	
	} 
	
	//acrescentado
	public function addSugestao($array){
		try{
			$query = $this->db->prepare("INSERT INTO sugestao(sugestao) VALUES(:sugestao)");
			$query->bindparam(":sugestao",$array['sugestao']);
			$query->execute();
			return true;
		}
		catch(PDOException $e){
			echo $e->getMessage(); 
			return false;
		}
	}
	
 	public function participantesUltimaViagem($id)
	{
		$query = $this->db->prepare("SELECT * FROM participantes where id_viagem = :id");
		$query->bindparam(":id",$id);
		$query->execute();
		$dados=$query->fetchall(PDO::FETCH_ASSOC);
		
		return $dados;
	}	
 
}