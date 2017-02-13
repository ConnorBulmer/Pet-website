<!DOCTYPE html>
<html>
<head>
    <title>Petopedia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
    <link href="grayscale.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
  $( function() {
    var availableTags = [
      "Male",
      "Female",
      "Bird",
      "Dog",
      "Cat",
      "Rabbit",
      "Chicken",
      "Red",
      "Tabby",
      "Black",
      "White",
      "Brown"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
</head>
<body>
 <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Petopedia</h1>
                        <p class="intro-text">Pet adoption Catalogue<p>
                        <form method="post" action="index.php#pets">
                          <input type="text" id="tags" name="fname" style="color: black; height: 30px; width:300px;"><br>

                        <select name="formGender" style="color: black; height: 30px; width:150px;">
                          <option value="Animal_ID">ID</option>
                          <option value="Animal_Name">Name</option>
                          <option value="animal_type">Type</option>
                          <option value="Animal_Gender">Gender</option>
                          <option value="Animal_Breed">Breed</option>
                          <option value="Animal_Color">Color</option>
                          <option value="Address">Address</option>
                        </select>

                          <input type="submit" value="Submit" style="color: black; height: 30px; width:150px;">
                        </form>
                        <a href="/">
                        View All
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php

require 'database.php' ;
?>
<div id="pets"></div>
<div class="row">
<div class="col-md-8 col-md-offset-2">
<?php

    if ($_POST) {
        if ($_POST['formGender'] == "Animal_Gender"){
            $result = mysqli_query($conn,"SELECT * FROM pets WHERE ". $_POST['formGender'] . "='" .$_POST['fname']."'" );
        }else{
            $result = mysqli_query($conn,"SELECT * FROM pets WHERE ". $_POST['formGender'] . " LIKE '%" .$_POST['fname']."%'" );
        }


    }else {
        $result = mysqli_query($conn,"SELECT * FROM pets");
    }



    echo "<table class=\"table table-bordered\">
    <tr>
    <th>Pet ID</th>
    <th>Name</th>
    <th>Type</th>
    <th>Gender</th>
    <th>Breed</th>
    <th>Color</th>
    <th>Address</th>
    </tr>";

    while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Animal_ID'] . "</td>";
    echo "<td>" . $row['Animal_Name'] . "</td>";
    echo "<td>" . $row['animal_type'] . "</td>";
    echo "<td>" . $row['Animal_Gender'] . "</td>";
    echo "<td>" . $row['Animal_Breed'] . "</td>";
    echo "<td>" . $row['Animal_Color'] . "</td>";
    echo "<td>" . $row['Address'] . "</td>";
    echo "<td><a href='petdetails.php?id=".$row['Animal_ID']."'>View pet</td>";

    echo "</tr>";
    }

echo "</table>";

mysqli_close($conn);
?>
</div>
</div>

</body>
</html>
