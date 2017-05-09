<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer  dumpautoload
class Lich
{
	var $id;
	var $idphong;
    var $idthu;
    var $idbuoi;
	var $idtuan;
    var $idmh;
    var $idgv;
		    
	function Lich($id1,$id2,$id3,$id4,$id5,$id6,$id7){
		
		$this->id = $id1;
		$this->idphong = $id2;
        $this->idthu = $id3;
        $this->idbuoi = $id4;
		$this->idtuan = $id5;
        $this->idmh = $id6;
        $this->idgv = $id7;
	}
}

function objectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('objectToArray', (array) $object);
}

function coverData($str){
	$posPhay = strpos($str, ','); // tim vi tri day phay

	$tuan = substr($str,0,$posPhay); // get Tuan
	$len = strlen($str); //get string lenght
	$str = substr($str, $posPhay+1, $len-1); //bo Tuan ra khoi chuoi
	$posPhay = strpos($str, ',');
	$thu = substr($str,0,$posPhay); //get Thu
	$len = strlen($str); //get string lenght
	$buoi = substr($str, $posPhay+1, $len-1); //get Buoi
	$lich = array('tuan' => $tuan, 'thu' => $thu, 'buoi' => $buoi);
	return $lich;
}

function checkParentArray($arrayA, $arrayB){
	$k=0;
	for ($i=0; $i<count($arrayA); $i++)
	{
	    for ($j=0;$j<count($arrayB);$j++)
	    {
	        if($arrayA[$i] == $arrayB[$j])
	        {
	            $k++;
	        }
	    }
	}
	if ($k === count($arrayA))
	{
		return true;
	}
	else
	{
		return false;
	}
}


?>