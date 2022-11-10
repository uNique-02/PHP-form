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
        <?php 
        if(exists($_POST["name"])){
            include "exists.html";
        }
        else{
            $myFile = fopen("users.txt", "w");
            fwrite($myFile, strtolower($_POST["name"]));

            $picture =  $_POST["picture"];
            $name = $_POST["name"];
            $age = $_POST["age"];
            $bday = $_POST["bday"];
            $address = $_POST["address"];
            $motto = $_POST["motto"];
            $course = $_POST["course"];
            $courses = $_POST["subjects"];
            $hb1 = $_POST["h1"];
            $hb2 = $_POST["h2"];
            $hb3 = $_POST["h3"];
            $hb4 = $_POST["h4"];
            $hb5 = $_POST["h5"];

            mkdir("data/".$name);
            file_put_contents("data/$name/name.txt", $name);
            file_put_contents("data/$name/age.txt", $age);
            file_put_contents("data/$name/bday.txt", $bday);
            file_put_contents("data/$name/address.txt", $address);
            file_put_contents("data/$name/motto.txt", $motto);
            file_put_contents("data/$name/courses.txt", serialize($courses));
            file_put_contents("data/$name/course.txt", $course);
            file_put_contents("data/$name/hb1.txt", $hb1);
            file_put_contents("data/$name/hb2.txt", $hb2);
            file_put_contents("data/$name/hb3.txt", $hb3);
            file_put_contents("data/$name/hb4.txt", $hb4);
            file_put_contents("data/$name/hb5.txt", $hb5);
        ?>
        <h1>Online Slambook</h1>
        <div class="content">
            <div>
                <img height="300px" width="250px" src="<?php echo $picture ?>" alt="My Picture">
                <fieldset>
                    <legend><h2 class="legend">
                        Motto in Life
                    </h2></legend>
                    
                    <q><i><?php echo $motto?></i></q>
                </fieldset>
                
            </div>

            <div>
                <div>
                    <h2>
                        Personal Information
                    </h2>
                    <p>
                        <span>Name: </span> <?php echo $name?>
                    </p>
                    <p>
                        <span>Age: </span> <?php echo $age?>
                    </p>
                    <p>
                        <span>Birthday: </span> <?php echo $bday?>
                    </p>
                    <p>
                        <span>Address: </span> <?php echo $address?>
                    </p>
                    <p>
                        <span>Course: </span> <?php echo $course?>
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
                                <?php $course_file= file("Subjects/".$course.".txt")?>
                                <tr>
                                    <?php 
                                        foreach($course_file as $indiv){
                                            ?>
                                                <td> <?php echo $indiv ?> </td>
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
                            foreach($_POST["movies"] as $movie){
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
                        <?php echo $_POST["h1"]; ?>
                    </li>
                    <li>
                        <?php echo $_POST["h2"]; ?>
                    </li>
                    <li>
                        <?php echo $_POST["h3"]; ?>
                    </li>
                    <li>
                        <?php echo $_POST["h4"]; ?>
                    </li>
                    <li>
                        <?php echo $_POST["h5"]; ?>
                    </li>
                </ul>
                </fieldset>
            </div>
        </div>
        <?php    }  ?>
        <?php function exists($user){
            $users = file("users.txt");
            if(in_array(strtolower($user), $users)){
                return true;
            }
            return false;
        }?>

    </body>
</html>
