<?php
class Address{
    private $userId;
    private $region;
    private $province;
    private $town;
    private $street;
    private $houseNumber;
    private $otherInfo;

    public function __construct ($userId, $region, $province, $town, $street, $houseNumber, $otherInfo){
        $this->userId = $userId;
        $this->region = $region;
        $this->province = $province;
        $this->town = $town;
        $this->street = $street;
        $this->houseNumber = $houseNumber;
        $this->otherInfo = $otherInfo;
    }


	public function getUserId() {
		return $this->userId;
	}

	public function setUserId($userId) {
		$this->userId = $userId;
	}


	public function getRegion() {
		return $this->region;
	}

	public function setRegion($region) {
		$this->region = $region;
	}


	public function getProvince() {
    	return $this->province;
  	}

	public function setProvince($province) {
		$this->province = $province;
	}


	public function getTown() {
		return $this->town;
	}

	public function setTown($town) {
		$this->town = $town;
	}


	public function getStreet() {
		return $this->street;
	}

	public function setStreet($street) {
		$this->street = $street;
	}


	public function getHouseNumber() {
		return $this->houseNumber;
	}

	public function setHouseNumber($houseNumber) {
		$this->houseNumber = $houseNumber;
	}

	
	public function getOtherInfo() {
		return $this->otherInfo;
	}

	public function setOtherInfo($otherInfo) {
		$this->otherInfo = $otherInfo;
	}

}