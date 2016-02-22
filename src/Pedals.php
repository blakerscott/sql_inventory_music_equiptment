<?php
	 class Pedals
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
	}
 ?>
