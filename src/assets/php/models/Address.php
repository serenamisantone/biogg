<?php
class Address
{
	private $id;
	private $userId;
	private $regione;
	private $provincia;
	private $comune;
	private $via;
	private $civico;
	private $otherInfo;

	public function __construct($userId, $regione, $provincia, $comune, $via, $civico, $otherInfo)
	{
		$this->userId = $userId;
		$this->regione = $regione;
		$this->provincia = $provincia;
		$this->comune = $comune;
		$this->via = $via;
		$this->civico = $civico;
		$this->otherInfo = $otherInfo;
	}
	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getUserId()
	{
		return $this->userId;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
	}


	public function getRegione()
	{
		return $this->regione;
	}

	public function setRegione($regione)
	{
		$this->regione = $regione;
	}


	public function getProvincia()
	{
		return $this->provincia;
	}

	public function setProvincia($provincia)
	{
		$this->provincia = $provincia;
	}


	public function getComune()
	{
		return $this->comune;
	}

	public function setComune($comune)
	{
		$this->comune = $comune;
	}


	public function getVia()
	{
		return $this->via;
	}

	public function setVia($via)
	{
		$this->via = $via;
	}


	public function getCivico()
	{
		return $this->civico;
	}

	public function setcivico($civico)
	{
		$this->civico = $civico;
	}


	public function getOtherInfo()
	{
		return $this->otherInfo;
	}

	public function setOtherInfo($otherInfo)
	{
		$this->otherInfo = $otherInfo;
	}

	public function getJson()
{
    return [
        'id' => $this->getId(),
        'user_id' => $this->getUserid(),
        'regione' => $this->getRegione(),
        'provincia' => $this->getProvincia(),
        'comune' => $this->getComune(),
        'via' => $this->getVia(),
        'civico' => $this->getCivico(),
        'other_info' => $this->getOtherInfo(),
    ];
}
}