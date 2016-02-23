<?php


	 class Pedal
		{
		private $brand;
		private $model;
		private $type;
		private $batteries;
		private $rating;
		private $id;

		function __construct($brand, $model, $type, $batteries, $rating, $id = NULL)
		{
			$this->brand = $brand;
			$this->model = $model;
			$this->type = $type;
			$this->batteries = $batteries;
			$this->rating = $rating;
			$this->id = $id;
		}

		function getBrand()
		{
			return $this->brand;
		}

		function setBrand($brand)
		{
			$this->brand = $brand;
		}
		function getModel()
		{
			return $this->model;
		}

		function setModel($model)
		{
			$this->model = $model;
		}
		function getType()
		{
			return $this->type;
		}

		function set($type)
		{
			$this->type = $type;
		}
		function getBatteries()
		{
			return $this->batteries;
		}

		function setBatteries($batteries)
		{
			$this->batteries = $batteries;
		}
		function getRating()
		{
			return $this->rating;
		}

		function setRating()
		{
			$this->rating = $rating;
		}
		function getID()
		{
			return $this->id;
		}

		function setID($id)
		{
			$this->id = $id;
		}

		function save()
		{
			$GLOBALS['db']->exec("INSERT INTO pedals (brand, model, type, batteries, rating) VALUES ('{$this->brand}', '{$this->model}', '{$this->type}','{$this->batteries}','{$this->rating}');");
			$this->id = $GLOBALS['db']->lastInsertId();
		}


		static function getAll()
		{
			$returned_pedals = $GLOBALS['db']->query('SELECT * FROM pedals;');
			$pedals = array();
			foreach($returned_pedals as $pedal) {
			  $brand = $pedal['brand'];
			  $model = $pedal['model'];
			  $type = $pedal['type'];
			  $batteries = $pedal['batteries'];
			  $rating = $pedal['rating'];
			  $id = $pedal['id'];
			  $new_pedal = new Pedal($brand, $model, $type, $batteries, $rating, $id);
			  array_push($pedals, $new_pedal);
			}
			return $pedals;

		}

		function explodeObj()
		{
			return get_object_vars($this);
		}

		static function deleteAll()
		{
			$GLOBALS['db']->exec("DELETE FROM pedals;");
		}

		static function find($keyword)
		{
			$pedals = Pedal::getAll();
			$result = array();
			foreach($pedals as $pedal)
			{
				$splitObj = $pedal->explodeObj();
				if(in_array($keyword, $splitObj))
				{
					array_push($result, $pedal);
				}
			}
			return $result;
		}


	}
 ?>
