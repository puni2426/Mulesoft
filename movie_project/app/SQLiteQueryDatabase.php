<?php

	namespace App;

	class SQLiteQueryDatabase {

    		private $pdo;

	    public function __construct($pdo) {
	        $this->pdo = $pdo;
		    }

	    public function getMovieList() {
	        $stmt = $this->pdo->query('SELECT mov_id, mov_title, director, mov_year, mov_time, mov_lang, mov_dt_rel '
                . 'FROM movie');
	        return $stmt;
	    }

	    public function getActorList() {
	        $stmt = $this->pdo->query('SELECT *  ' . 'FROM actor');
	      return $stmt;
		}

	    public function getActingList() {
	        $stmt = $this->pdo->query('SELECT *  ' . 'FROM film_actor');
	      return $stmt;
		}
	}
?>
