<?php
foreach(glob("*.html") as $file){
rename($file,substr($file,0,-5).".blade.php");
}