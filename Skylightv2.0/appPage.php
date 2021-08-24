<?php
    // App Page
    // Kamil Sacha
    // Last Update: April 30, 2021

    // This page displays all the apps that are a part of Skylight and allows users to search/filter for apps they wish to discover

    session_start();

    if(isset($_POST['search'])){
        $valuetoSearch = $_POST['searchValue'];
        $query = "SELECT name, creator, price, genre, platforms FROM apps WHERE CONCAT(name, creator, price, genre, platforms) LIKE '%".$valuetoSearch."%'";
        $search_result = filterTable($query);
        
    }elseif(isset($_POST['allApps'])){
        $query = "SELECT name, creator, price, genre, platforms FROM apps";
        $search_result = filterTable($query);
    }
    
    else{
        $query = "SELECT name, creator, price, genre, platforms FROM apps";
        $search_result = filterTable($query);
    }


    function filterTable($query){
        $conn = mysqli_connect('localhost', 'root', "", 'skylight_db');
        $filter_Result = mysqli_query($conn, $query);
        return $filter_Result;
    }
?>

<!DOCTYPE html>

<?php
    include_once 'header.php';
?>
	<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	</head>
	
	<script type="text/javascript">
		$(function() {
			$("#searchValue").autocomplete({
				source: 'search_db.php',
			});
		});
	</script>

    <div id=appPageBody>
        <h1>All Apps</h1>
        <form action="appPage.php" method="post">
            <input type="text" name="searchValue" id="searchValue" placeholder="Search..."><br><br>
            <input type="submit" name="search" value="Search">
            <input type="submit" name="allApps" value="See All Apps"><br><br>

            <table id="appTable">
                <tr>
                    <th>App Name</th>
                    <th>Creator</th>
                    <th>Price</th>
                    <th>Genre</th>
                    <th>Platforms</th>
                </tr>
                <?php while($row = mysqli_fetch_array($search_result)):?>
                    <tr>
                    <?php 
                        $linkName = $row['name'];
                        $linkName = str_replace(' ','',$linkName);
                        $linkName = strtolower($linkName);
                    ?>

                        <td><a href="<?php echo $linkName; ?>AppPage.php"><?php echo $row['name'];?></a></td>
                        <td><?php echo $row['creator'];?></td>
                        <td><?php echo $row['price'];?></td>
                        <td><?php echo $row['genre'];?></td>
                        <td><?php echo $row['platforms'];?></td>
                    </tr>
                <?php endwhile;?>
            </table>
        </form>
    </div>
</body>
</html>
