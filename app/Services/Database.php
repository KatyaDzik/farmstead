<?php

namespace App\Services;

    class Database {
        private $db;
        private $error;

        public function __construct() {
            $config = require "config/db.php";
            $conn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db'].';charset=UTF8';
            $options = array(
                \PDO::ATTR_PERSISTENT => true,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            );
            try {
                $this->db = new \PDO($conn, $config['username'], $config['password'], $options);
            } catch (\PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //Allows us to write queries
        public function query($sql, $params = []) {
            // Подготовка запроса
			$stmt = $this->db->prepare($sql);
			
			// Обход массива с параметрами 
			// и подставление значений
			if ( !empty($params) ) {
				foreach ($params as $key => $value) {
					$stmt->bindValue(":$key", $value);
				}
			}
			
			// Выполняем запрос
			$stmt->execute();
			// Возвращаем ответ
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function queryInserUpdate($sql, $params = []) {
            // Подготовка запроса
            $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES,TRUE);
			$stmt = $this->db->prepare($sql);
			
			// Обход массива с параметрами 
			// и подставление значений
			if ( !empty($params) ) {
				foreach ($params as $key => $value) {
					$stmt->bindValue(":$key", $value);
				}
			}
			// Выполняем запрос
			$stmt->execute();
            if($stmt){
                return true;
            }
			// Возвращаем ответ
			//return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        //getAll() - двумерный массив, индексированный числами по порядку
        public function getAll($table, $sql = '', $params = [])
		{
			return json_encode($this->query("SELECT * FROM $table" . $sql, $params));
		}

        //getRow() - одномерный массив, первую строку результата
		public function getRow($table, $sql = '', $params = [])
		{
			$result = $this->query("SELECT * FROM $table" . $sql, $params);
			return $result[0]; 
		}

        public function getLastInsertId() {
            return $this->db->lastInsertId();
        }

      
      
    }