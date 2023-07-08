<?php

namespace App\Models\Entidades;

class CategoriaDePatrimonio{

    private $cat_pat_id;
    private $cat_pat_nome;

	public function setCatPatId($cat_pat_id){
		$this->cat_pat_id = $cat_pat_id;
	}

    public function getCatPatId(){
		return $this->cat_pat_id;
	}

	public function setCatPatNome($cat_pat_nome){
		$this->cat_pat_nome = $cat_pat_nome;
	}

	public function getCatPatNome(){
		return $this->cat_pat_nome;
	}
}

?>
