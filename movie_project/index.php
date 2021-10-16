<?php
	require './vendor/autoload.php';

	use App\SQLiteConnection as SQLiteConnection;
	use App\SQLiteCreateTable as SQLiteCreateTable;
	use App\SQLiteInsert as SQLiteInsert;
	use App\SQLiteQueryDatabase as SQLiteQueryDatabase;
	
	$conn = (new SQLiteConnection())->connect();
	$sqliteCreate = new SQLiteCreateTable($conn);

	$sqliteCreate->createTables();

	$sqliteInsert = new SQLiteInsert($conn);
	$sqliteInsert->insertMovie(902,'Venom','Andy Serkis',2018,112,'English','2018-05-10');
	$sqliteInsert->insertMovie(903,'Legion','Scott Stewart',2010,100,'English','2010-01-22');
	$sqliteInsert->insertMovie(904,'Spider-man: Far From Home','Jon Watts',2019,129,'English','2019-07-04');
	$sqliteInsert->insertMovie(905,'Hacker','Poul Berg',2019,96,'Danish','2019-03-28');
	$sqliteInsert->insertMovie(906,'Tanhaji: The Unsung Warrior','Om Raut',2020,134,'Hindi','2021-01-10');
	$sqliteInsert->insertMovie(907,'Dabangg 3','Prabhu Deva',2019,163,'Hindi','2021-12-20');
	$sqliteInsert->insertMovie(908,'Gully Boy','Zoya Akhtar',2019,156,'Hindi','2019-02-14');
	$sqliteInsert->insertMovie(909,'Mission Mangal','Jagan Shakti',2019,133,'Hindi','2019-08-15');
	
	$sqliteInsert->insertActor(1,'Ranveer','Singh');
	$sqliteInsert->insertActor(2,'Tom','Hardy');
	$sqliteInsert->insertActor(3,'Akshay','Kumar');
	$sqliteInsert->insertActor(4,'Salman','Khan');
	$sqliteInsert->insertActor(5,'Tom','Holland');
	$sqliteInsert->insertActor(6,'Josephine','Hojbjerg');
	$sqliteInsert->insertActor(7,'Ajay','Devgn');
	$sqliteInsert->insertActor(8,'Alia','Bhatt');
	$sqliteInsert->insertActor(9,'Tapsee','Pannu');
	$sqliteInsert->insertActor(10,'Sonakshi','Sinha');
	$sqliteInsert->insertActor(11,'Kajol','');
	
	$sqliteInsert->insertFilmActor(1,908,'Ranver Singh');
        $sqliteInsert->insertFilmActor(2,902,'Tom Hardy');
        $sqliteInsert->insertFilmActor(3,909,'Akshay Kumar');
        $sqliteInsert->insertFilmActor(4,907,'Salman Khan');
        $sqliteInsert->insertFilmActor(5,904,'Tom Holland');
        $sqliteInsert->insertFilmActor(6,905,'Josephine Hojbjerg');
        $sqliteInsert->insertFilmActor(7,906,'Ajay Devgn');
        $sqliteInsert->insertFilmActor(8,908,'Alia Bhatt');
        $sqliteInsert->insertFilmActor(9,909,'Tapsee Pannu');
        $sqliteInsert->insertFilmActor(10,907,'Sonakshi Sinha');
        $sqliteInsert->insertFilmActor(11,906,'Kajol');

	$sqliteQuery = new SQLiteQueryDatabase($conn);
	$movieStmt = $sqliteQuery->getMovieList();
	$actorStmt = $sqliteQuery->getActorList();
	$actingStmt = $sqliteQuery->getActingList();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="sqlitetutorial.net">
        <title>Movie DB</title>
        <link href="http://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>MOVIE DETAILS</h1>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Movie ID</th>
                        <th>Movie Title</th>
                        <th>Director</th>
                        <th>Movie Year</th>
                        <th>Movie Duration</th>
                        <th>Movie Language</th>
                        <th>Movie Release Date</th>
                    </tr>
                </thead>
		<?php
                while ($row = $movieStmt->fetch(\PDO::FETCH_ASSOC)) {
                ?>
		<tbody>
			<tr>
				<td><?php echo $row['mov_id']; ?></td>
				<td><?php echo $row['mov_title']; ?></td>
				<td><?php echo $row['director']; ?></td>
				<td><?php echo $row['mov_year']; ?></td>
				<td><?php echo $row['mov_time']; ?></td>
				<td><?php echo $row['mov_lang']; ?></td>
				<td><?php echo $row['mov_dt_rel']; ?></td>
			</tr>
			<?php
				}
			?>
                </tbody>
            </table>
            
            
            <div class="page-header">
                <h1>ACTOR DETAILS</h1>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Actor ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                </thead>
		<?php
                while ($row = $actorStmt->fetch(\PDO::FETCH_ASSOC)) {
                ?>
		<tbody>
			<tr>
				<td><?php echo $row['actor_id']; ?></td>
				<td><?php echo $row['first_name']; ?></td>
				<td><?php echo $row['last_name']; ?></td>
			<?php
				}
			?>
                </tbody>
            </table>
            
                       <div class="page-header">
                <h1>ACTORS ACTING IN MOVIES</h1>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Actor ID</th>
                        <th>Movie ID</th>
                        <th>Actor Name</th>
                    </tr>
                </thead>
		<?php
                while ($row = $actingStmt->fetch(\PDO::FETCH_ASSOC)) {
                ?>
		<tbody>
			<tr>
				<td><?php echo $row['actor_id']; ?></td>
				<td><?php echo $row['mov_id']; ?></td>
				<td><?php echo $row['actor_name']; ?></td>
			<?php
				}
			?>
                </tbody>
            </table>

        </div>
    </body>
</html>
