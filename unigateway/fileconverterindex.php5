<?php
include_once(dirname(__FILE__) . "/Encoder/transformer.php5");

$input_text = $_POST["input_text"];
$font = $_POST["font"];
$encoding = $_POST["encoding"];

if(is_uploaded_file($_FILES['input_file']['tmp_name']))
{
	$fp = fopen($_FILES["input_file"]["tmp_name"],"r");
        
        if($fp)
	{
	 $t = new Transformer();
	 $out_file_name = basename ($_FILES["input_file"]["name"]) . "_out.txt";
	 header("Content-type: text/plain; charset:utf-8");
	 header('Content-Disposition: attachment; filename="' . $out_file_name . '"');
	 while(!feof($fp))
	  {
	   $str = fgets($fp);
	   $str1 = mb_convert_encoding ($str,"UTF-8","$encoding");
	   $str2 = html_entity_decode($str1, ENT_QUOTES, "UTF-8");
	   $str3 = mb_convert_encoding ($str2,"$encoding","UTF-8");
	   $st   = mb_convert_encoding ($str3,"UTF-8","$encoding");
	
	   $reslut = $t->convert($st,$font);
	   echo $reslut; 
	  }
	}
 	fclose($fp);
	exit;
}
?><?php print '<?xml version="1.0" encoding="iso-8859-1"?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Unicode converter</title>
  <style type="text/css">
  body {
    font-size: smaller;
    font-family: sans;
  }
  div.input_text {
    float: left;
  }
  div.output_text {
    margin-right: 20px;
  }
  fieldset {
    margin: 10px;
  }
  </style>
</head>
<body>

<h1>Unicode converter</h1>

<form method="post" enctype="multipart/form-data" action="fileconverterindex.php5">
  <fieldset>
    <legend><strong>Convert a File</strong></legend>
    <p>Upload a text file to convert into Unicode:</p>
    <input type="file" name="input_file" />
    <select name="font">
      <?php
	foreach (array_keys($fontinfo) as $key => $value) { ?>
          <option value="<?php echo $value ?>"> <?php echo $value; ?> </option>                    
   <?php } ?> 
    </select>
    <select name="encoding">
      <option value="ISO-8859-1">ISO-8859-1</option>
      <option value="Windows-1252">Windows-1252</option>
      <option value="UTF-8">UTF-8</option>
    </select>
    <input type="submit" value="Convert" />
  </fieldset>
</form>

<hr />

</body>
</html>
