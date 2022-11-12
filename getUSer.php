<!DOCTYPE html>
<html>
    <head>
        <title>Online Slambook</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="profileRequest.css">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles&display=swap');
        </style> 
    </head>
    <body>
        
         <?php $name = $_POST["name"];
         
        $conn = new PDO('mysql:host=127.0.0.1:3308;dbname=cmsc121', "root", null);
        //retrieves the data and store it to $result variable as an array
        $query = $conn->query("SELECT name, age, birthday, address, motto, course FROM users WHERE name='$name'");
        $max_row = $query->fetch(PDO::FETCH_ASSOC);
        
        if(exists($_POST["name"])){
            include "notExists.html";
        }
        else{
        
        $courses = file("data/$name/courses.txt");
        $movies = file("data/$name/movies.txt");
        $course = implode(" ", file("data/$name/course.txt"));
        $hb1 = implode(" ", file("data/$name/hb1.txt"));
        $hb2 = implode(" ", file("data/$name/hb2.txt"));
        $hb3 = implode(" ", file("data/$name/hb3.txt"));
        $hb4 = implode(" ", file("data/$name/hb4.txt"));
        $hb5 = implode(" ",file("data/$name/hb5.txt"));
        $picture= implode(" ", file("data/$name/images.txt"));
                ?>
         <h1>Online Slambook</h1>
        <div class="content">
            <div>
                <img height="300px" width="250px" src="<?php echo $picture ?>" alt="My Picture">
                <fieldset>
                    <legend><h2 class="legend">
                        Motto in Life
                    </h2></legend>
                    
                    <q><i><?php 
                    echo $max_row["motto"]?></i></q>
                </fieldset>
                
            </div>

            <div>
                <div>
                    <h2>
                        Personal Information
                    </h2>
                    <p>
                        <span>Name: </span> <?php echo $max_row["name"]?>
                    </p>
                    <p>
                        <span>Age: </span> <?php echo $max_row["age"]?>
                    </p>
                    <p>
                        <span>Birthday: </span> <?php echo $max_row["birthday"] ?>
                    </p>
                    <p>
                        <span>Address: </span> <?php echo $max_row["address"]?>
                    </p>
                    <p>
                        <span>Course: </span> <?php echo $max_row["course"]?>
                    </p>
                </div>
                <div>
                    <h2>
                        My class schedule for this semester:
                    </h2>
                    <table>
                        <tr>
                            <th id="c1"> <span>SUBJECTS</span> </td>
                            <th id="c2"> <span>SEC</span> </th>
                            <th id="c3"> <span>UNIT</span> </th>
                            <th id="c4"> <span>DAYS</span> </th>
                            <th id="c5"> <span>TIME</span> </th>
                            <th id="c6"> <span>ROOM</span> </th>
                            <th id="c7"> <span>CLASS TYPE</span> </th>
                        </tr>
                        <tr>
                        
                        <?php 
                            foreach($courses as $course){ ?>
                                <?php $course_file= file("Subjects/".trim($course).".txt")?>
                                <tr>
                                    <?php 
                                        foreach($course_file as $indiv){
                                            ?>
                                                <td> <?= $indiv ?> </td>
                                            <?php
                                        }

                                    ?>
                                </tr> 
                                <?php
                            }
                        
                        ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div>
                <h2>Favorites</h2>
                <fieldset>
                    <legend><h3>
                        <h3 class="legend">Favorite Movie/Series</h3>
                    </h3></legend>
                    <ol>
                        <?php 
                            foreach($movies as $movie){
                                ?>
                                    <li> <?php echo $movie; ?> (<a href="google.com">IMDB</a>) </li>
                                <?php
                            }

                        ?>
                    </ol>
                </fieldset>
                <fieldset>
                    <legend><h3>
                        <h3  class="legend">Hobbies</h3>
                    </h3></legend>
                <ul>
                    <li>
                        <?php echo $hb1; ?>
                    </li>
                    <li>
                        <?php echo $hb2; ?>
                    </li>
                    <li>
                        <?php echo $hb3; ?>
                    </li>
                    <li>
                        <?php echo $hb4; ?>
                    </li>
                    <li>
                        <?php echo $hb5; ?>
                    </li>
                </ul>
                </fieldset>
            </div>
        </div>
        <?php 
        }
        function exists($user){
            $users = file("users.txt");
            if(in_array(strtolower($user), $users)){
                return true;
            }
            return false;
        }?>

    </body>
</html>