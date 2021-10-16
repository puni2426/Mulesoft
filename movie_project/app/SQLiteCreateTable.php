<?php

	namespace App;

	class SQLiteCreateTable {

   		private $pdo;

		public function __construct($pdo) {
        	$this->pdo = $pdo;
    		}

	    public function createTables() {
        	$commands = ['CREATE TABLE IF NOT EXISTS movie (mov_id INTEGER PRIMARY KEY AUTOINCREMENT,
			        mov_title TEXT NOT NULL, 
     				director TEXT NOT NULL,
				mov_year INTEGER NOT NULL, 
       				mov_time INTEGER, 
       				mov_lang TEXT, 
       				mov_dt_rel VARCHAR(25))',
            'CREATE TABLE IF NOT EXISTS actor (actor_id INTEGER PRIMARY KEY AUTOINCREMENT,
            			first_name VARCHAR (50) NOT NULL, 
           			last_name VARCHAR (50) NOT NULL)',
            'CREATE TABLE IF NOT EXISTS film_actor (actor_id INTEGER NOT NULL,
				mov_id INTEGER NOT NULL,
				actor_name VARCHAR (25) NOT NULL,
				PRIMARY KEY (actor_id, mov_id),
				FOREIGN KEY (actor_id) REFERENCES actor (actor_id) 
				ON DELETE CASCADE ON UPDATE NO ACTION,
				FOREIGN KEY (mov_id) REFERENCES movie (mov_id) 
				ON DELETE CASCADE ON UPDATE NO ACTION)'];
       		 foreach ($commands as $command) {
            		$this->pdo->exec ($command);
        	}
    }
/*
    public function getTableList () {

        $stmt = $this->pdo->query ("SELECT *
                                   FROM sqlite_master
                                   WHERE type = 'table'
                                   ORDER BY name");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }

        return $tables;

    }
*/
}
?>
