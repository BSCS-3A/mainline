<?php
if(isset($_POST['text'])){
    $text = $_POST['text'];
    if($text != ""){
        $text_message = "0||".$text."||".date('h:i')."||".date('Y/m/d')."||read"."##\n";
        $file = "../../user/msg/".$_POST['idup'].".html";
        $search = array(
            '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
        );
        $text_message = preg_replace($search, '',$text_message);
        $text_message = trim($text_message);
        $text_message = stripslashes($text_message);
        $text_message = htmlspecialchars($text_message);
        file_put_contents($file, $text_message, FILE_APPEND | LOCK_EX);
    }
}
?>