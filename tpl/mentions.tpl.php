
<h1><?php echo c("Mentions"); ?></h1>
<p><?php echo c('Mentions-infos'); ?></p>
<img src='https://cdn-icons-png.flaticon.com/512/9033/9033089.png' alt='mentions légale'></img>

<?php 
//put the file path here
$filepath = (__DIR__ . "/languages/" . get_langue() . ".ini");
//after the form submit
if($_POST){
    $data = $_POST;
    //update ini file, call function
    update_ini_file($data, $filepath);
}
//this is the function going to update your ini file
    function update_ini_file($data, $filepath) { 
        $content = ""; 
        
        //parse the ini file to get the sections
        //parse the ini file using default parse_ini_file() PHP function
        $parsed_ini = parse_ini_file($filepath, true);
        
        foreach($data as $section=>$values){
            //append the section 
            $content .= "[".$section."]n"; 
            //append the values
            foreach($values as $key=>$value){
                $content .= $key."=".$value."n"; 
            }
        }
        
        //write it into file
        if (!$handle = fopen($filepath, 'w')) { 
            return false; 
        }
        $success = fwrite($handle, $content);
        fclose($handle); 
        return $success; 
    }
?>
<html>
<body>
<?php 
//parse the ini file using default parse_ini_file() PHP function
$parsed_ini = parse_ini_file(get_ini(), true);
?>
<form action="" method="post">
    <?php 
        
    foreach($parsed_ini as $section=>$values){
        echo "<h3>$section</h3>";
        //keep the section as hidden text so we can update once the form submitted
        echo "<input type='hidden' value='$section' name='$section' />";
        //print all other values as input fields, so can edit. 
        //note the name='' attribute it has both section and key
        foreach($values as $key=>$value){
            echo "<p>".$key.": <input type='text' name='{$section}[$key]' value='$value' />"."</p>";
        }
        echo "<br>";
    }
    ?>
    <input type="submit" value="Update INI" />
</form>
<a target="_blank" href="config.ini">Open Config File</a>
</body>
</html>