<?php

	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/

	require_once 'src/Pedal.php';

	// This error reporting shit is all about being able to see verbose error messages
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	// This is from Jason Awbrey. This is how I decided to structure
	// Our connection to the database, because if forwhatever reason
	// The connection doesn't work then I want the user to see
	// Whatever error message is available, instead of just not
	// Having the application work.
	// This is known as a try catch block and is a useful code architecture
	// For attmpting to run code, and if it fails then having something
	// Specific happen... like printing an error message, or sending the user
	// To a different page.


		// try {
		//    $host = 'mysql:host=localhost;dbname=music_equipment_test';
		//    $username = 'root';
		//    $password = 'root';
		//    $db = new PDO($host, $username, $password);
		// 	$db->exec("SET NAMES 'utf8'");
		// 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// } catch(Exception $e){
		// 	echo 'Sorry, there seems to be a problem connecting to the database. Here is all we know:';
		// 	echo $e->getMessage();
		// 	die();
		// }
 // End of jason's rant


 $host = 'mysql:host=localhost;dbname=music_equipment_test';
 $username = 'root';
 $password = 'root';
 $db = new PDO($host, $username, $password);


	class PedalTest extends PHPUnit_Framework_TestCase
	{

		protected function tearDown()
		{
			Pedal::deleteAll();
		}

		function test_save_and_getAll()
		{
		//Arrange
		$test_pedal = new Pedal("Electro-Harmonix","Big Muff","Overdrive",1,4);


		//Act
		$test_pedal->save();
		$result = Pedal::getAll();

		//Assert
		$this->assertEquals($test_pedal, $result[0]);
		}

		function test_find()
		{
			//Arrange
			$test_pedal = new Pedal("Electro-Harmonix","Big Muff","Overdrive",1,4);

			//Act
			$test_pedal->save();
			$result = Pedal::find("Big");

			//Assert
			$this->assertEquals($test_pedal, $result[0]);
		}
	}

?>
