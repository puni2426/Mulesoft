<?php

	namespace App;

	class SQLiteInsert {

	    private $pdo;

	    public function __construct($pdo) {
        	$this->pdo = $pdo;
    		}

	    public function insertMovie($movId,$movTitle,$director,$movYear,$movTime,$movLang,$movDateRel) {
        	$sql = 'INSERT INTO movie(mov_id,mov_title,director,mov_year,mov_time,mov_lang,mov_dt_rel) '
                . 'VALUES(:mov_id,:mov_title,:director,:mov_year,:mov_time,:mov_lang,:mov_dt_rel)';

        	$stmt = $this->pdo->prepare($sql);
        	$stmt->execute([
           		':mov_id' => $movId, 
           		':mov_title' => $movTitle, 
           		':director' => $director, 
           		':mov_year' => $movYear, 
           		':mov_time' => $movTime, 
           		':mov_lang' => $movLang, 
           		':mov_dt_rel' => $movDateRel, 
        		]);

		return $this->pdo->lastInsertId();
		}

	    public function insertActor($actorId, $firstName, $lastName) {
        	$sql = 'INSERT INTO actor(actor_id,first_name,last_name) '
                . 'VALUES(:actor_id,:first_name,:last_name)';

        	$stmt = $this->pdo->prepare($sql);
        	$stmt->execute([
            		':actor_id' => $actorId,
            		':first_name' => $firstName,
            		':last_name' => $lastName,
        		]);

        	return $this->pdo->lastInsertId();
    		}

            public function insertFilmActor($actorId, $movId, $actorName) {
                $sql = 'INSERT INTO film_actor(actor_id,mov_id,actor_name) '
                . 'VALUES(:actor_id,:mov_id,:actor_name)';

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([
                        ':actor_id' => $actorId,
                        ':mov_id' => $movId,
                        ':actor_name' => $actorName,
                        ]);

                return $this->pdo->lastInsertId();
                }


	}
?>
