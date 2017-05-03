<?php
	function uploadFile($fileName)
{
		$killerPhoto = $fileName;
		$extension = pathinfo($killerPhoto['name'],PATHINFO_EXTENSION);
		$fileName = md5(rand(0, 1000).time()).".".$extension;

		move_uploaded_file($killerPhoto['tmp_name'], 'uploads/'.$fileName);

		return $fileName;
}
	if (isset($_POST["killer_name"])) {
		$photo1 = uploadFile($_FILES["killer_photo1"]);
		$photo2 = uploadFile($_FILES["killer_photo2"]);

		$id = md5(rand(0, 1000).time());
		$killerName= $_POST["killer_name"];
		$killerWeapon= $_POST["killer_weapon"];
		$killerBirthday= $_POST["killer_birthday"];
		$killerVictims= $_POST["killer_victims"];
		$killerStatus= $_POST["killer_status"];
		$killerCrimePenalty= $_POST["killer_crime_penalty"];
		$famousFor= $_POST["famous_for"];
		
		$handler = fopen('whatever.txt', 'a+');
		fwrite($handler, $id ."|".$killerName."|".$killerWeapon."|".$killerBirthday."|".
			$killerVictims."|". $killerStatus."|". $killerCrimePenalty."|". $famousFor."|".$photo1."|".$photo2."\n");
			fwrite($handler, md5(rand(0, 1000).time())."|".
			$_POST['killer_name']."|".
			$_POST['killer_weapon']."|".
			$_POST['killer_birthday']."|".
			$_POST['killer_victims']."|".
			$_POST['killer_status']."|".
			$_POST['killer_crime_penalty']."|".
			$_POST['famous_for']."|".
			$photo1."|".
			$photo2."\n"
		);
		fclose($handler);
	}
?>
<form action="add.php" method="post" enctype="multipart/form-data">
Nesveiko psichopato vardas: <input name="killer_name" /><br />
Nesveiko psichopato ginklas: <input name="killer_weapon" /><br />
Nesveiko psichopato gimimo diena: <input name="killer_birthday" /><br />
Nesveiko psichopato auku skaicius: <input name="killer_victims" /><br />
Nesveiko psichopato statusas: <input name="killer_status" /><br />
Nesveiko psichopato bausmes atlikimas: <input name="killer_crime_penalty" /><br />
Nesveiko psichopato aprasymas: <textarea name="famous_for" ></textarea><br />
Nesveiko psichopato veido fotografija: <input type="file" name="killer_photo1" /><br />
Nesveiko psichopato egzekucijos fotografija: <input type="file" name="killer_photo2" /><br />
<input type="submit" value="Issaugoti zudika"/>