

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF8">
        <title>CMSC 121 Day 03 - PHP</title>
        <link rel="stylesheet" href="profile.css">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles&display=swap');
        </style> 
    </head>
    <body>
         <?php 
            $id=0;
            
            ?>
        <div>
            <fieldset>
                <legend>New Profile</legend>
                <form method="POST" action="profileRequest.php">
                    <div class="grid">
                    <label name="picture">Profile Picture: </label>
                    <input type="file" name="picture" class="file" required>             
                    <label>Name: </label>
                    <input type="text" name="name" required>
                    <label name="age">Age: </label>
                    <input type="text" name="age" class="age" required>
                    <label name="bday">Birthday: </label>
                    <input type="date" name="bday" required>
                    <label name="address">Address: </label>
                    <input type="text" name="address" required>
                    <label name="motto">Motto: </label>
                    <textarea name="motto"></textarea>
                    <label for="course">Course: </label>
                    <select name="course" id="course"> 
                        <?php
                        //Creates connection  
                        $conn = new PDO('mysql:host=127.0.0.1:3308;dbname=cmsc121', "root", null);
                        //retrieves the data and store it to $result variable as an array
                        $result = $conn->query("SELECT id, name FROM courses");

                        foreach($result as $res){
                            ?> <option  value="<?php echo $res["name"]?>"> <?php
                            echo $res["name"]; ?>
                            </option> <?php
                        } 
                        ?>

                    </select>
                    <label>Subjects this sem: </label>
                    <select name="subjects[]" style="height: 100px;" multiple size="11"> 
                        <?php 
                            $result = $conn->query("SELECT id, name FROM subjects");
                            foreach($result as $res){
                                ?> <option  value="<?php echo $res["id"]?>"> <?php
                                echo $res["name"]; ?>
                                </option> <?php
                            } 
                        ?>
                    </select>
                    <label>Favorite Movie/Series: </label>
                    <select name="movies[]" style="height: 100px;" multiple size="11"> 
                        <?php 
                        $result = $conn->query("SELECT name FROM movies");
                        foreach($result as $res){
                            ?> <option  value="<?php echo $res["name"]?>"> <?php
                            echo $res["name"]; ?>
                            </option> <?php
                        } 
                        ?>
                    </select>
                    
                    <p>Hobbies (Max of 5)</p>
                    <p></p>
                    <label >Hobby 1</label>
                    <input type="text" name="h1" placeholder="Hobby 1" required>
                    <label >Hobby 2</label>
                    <input type="text" name="h2" placeholder="Hobby 2" required>
                    <label >Hobby 3</label>
                    <input type="text" name="h3" placeholder="Hobby 3" required>
                    <label >Hobby 4</label>
                    <input type="text" name="h4" placeholder="Hobby 4" required>
                    <label >Hobby 5</label>
                    <input type="text" name="h5" placeholder="Hobby 5" required>
                    </div>
                    <input type="submit" value=Submit class="button">
                </form>
            </fieldset>
            <div>
                
            </div>
        </div>
    </body>
</html>