<?php
class adatbazis_david
{
	// Tulajdonságok
	var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "skirmish_map_magus";
	var $port = "3306";

	// Konstruktor:
	function adatbazis()
	{

	}

	// function kapcsolatellenoriz()
	/*
	kapcsolatellenoriz fugvény lelenőrzi hogy az adatbázis látható e ha a kapcsolat lértejön viszatér egy igaz értékkel ha a kapcsolat nem jön lérte akkor vagy viszatér a Connection fal üzenettel vagy ha ez valamiért nem sikerül viszatér egy hamis értékkel.
	*/

	function kapcsolatellenoriz()
	{
		$conn = new mysqli($this->servername, $this->username, $this->password);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);

			return false;
		}
		else
		{
			return true;
		}
	}
	//function adatokkuldese($SQL)
	/*
	Ez a fügvény kifejezetten Insert Into parancsok futtatására szolgál a sikeres beilsztés esetén igaz érékkel tér visza ha nem sikerült akkor hamissal
	*/
	function adatokkuldese($SQL)
	{
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname, $this->$port);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			return false;
		}

		mysqli_set_charset($conn,"utf8"); // ez k fontos megmondja hogy a komunikációt utf8 ban folytatsuk mert különben karaterkodolási hibán lesz oda visza

		if ($conn->query($SQL) === TRUE) {
			//echo "New record created successfully";
			$conn->close();
			return true;


		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
			$conn->close();
			return false;
		}

	return "fatal error"; // ez sose fut le de láttunk már csodákat

	}

	//function adatkeres($SQL)
	/*
		SELECT adatkérés esetén használatos adatbázis kapcsoalt kezelése a fügvény siker esetén viszaér a $result érétkkel ami az adatbázis váalsza a sikeresn lefuttatott lekérdezésre
		A $result feldolgozása mindig eseti mivel nem azonos érékoszlopokat kérdezünk le általában
	*/

	function adatkeres($SQL)/// ez itt el van szabva
	{
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		mysqli_set_charset($conn,"utf8");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			return false;
		}

		$result = $conn->query($SQL);

		return $result;

		// minta lekérdezes feldolgozas
		/*
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			}
		} else {
			echo "0 results";
		}

		*/
		$conn->close();
	}

	//function SQL_futtat($SQL)
	/*
	Kissé univerzálisabb és butább fügvény bármien SQL parancs futtatásához
	*/

	function SQL_futtat($SQL)
	{
	/*
	echo "<br/>";
	echo $SQL;
	echo "<br/>";
	*/

	$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	mysqli_set_charset($conn,"utf8");

	$result = $conn->query($SQL);
	/*
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {

			echo "<br>";
			echo $row["tartalom"];
			echo "<br>";
			echo $row["elemtipus"];
			echo "<br>";


    }
	*/
	$conn->close();
	return	$result;
	}
}
?>
