

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
            
            $string = null;
            $courses = file("komsai_courses.txt");
            foreach ($courses as $course){
                $string = $string."\n".$course;
            }

            $stringM = null;
            $movies = file("id_fMovie.txt");
            foreach ($movies as $movie){
                $stringM = $stringM."\n".$movie;
            }
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
                        <option value="BS Computer Science" selected>
                            BS Computer Science
                        </option>
                        <option value="BS Management" >
                            BS Management
                        </option>
                        <option value="BS Biology" >
                            BS Biology
                        </option>
                        <option value="BA (SS) Political SCience">
                            BA (SS) Political SCience
                        </option>
                    </select>
                    <label>Subjects this sem: </label>
                    <select name="subjects[]" style="height: 100px;" multiple size="11"> 
                        <?php 
                        foreach($courses as $subject){?>
                        <option  value="<?php echo ++$id?>"> <?php
                            echo $subject; ?>
                        </option>
                            <?php
                        }
                        ?>
                    </select>
                    <label>Favorite Movie/Series: </label>
                    <select name="movies[]" style="height: 100px;" multiple> 
                        <?php 
                        foreach($movies as $movie){?>
                        <option value="<?php echo $movie?>"> <?php
                            echo $movie; ?>
                        </option>
                            <?php
                        }
                        ?>
                    </select>
                    
                    <p>Hobbies (Max of 5)</p>
                    <p></p>
                    <label name="h1">Hobby 1</label>
                    <input type="text" name="h1" placeholder="Hobby 1" required>
                    <label name="h2">Hobby 2</label>
                    <input type="text" name="h2" placeholder="Hobby 2" required>
                    <label name="h3">Hobby 3</label>
                    <input type="text" name="h3" placeholder="Hobby 3" required>
                    <label name="h4">Hobby 4</label>
                    <input type="text" name="h4" placeholder="Hobby 4" required>
                    <label name="h5">Hobby 5</label>
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