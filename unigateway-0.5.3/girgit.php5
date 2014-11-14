<?php
include_once(dirname(__FILE__) . "/config.php5");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Transliteration</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8"/>
<meta http-equiv="content-style-type" content="text/css"/>
<style type="text/css">
   .button_style{
      width: 40px; height: 40px; 
   }
   body{
   background-color:#f6f6ff;
   font-family: sans;
   font-size: smaller;
   text-align:center;
   margin: 100px; 
   border: 0px solid black; 
   }
</style>
</head>

<body>
<form method="get" action="transliterate.php5">

  <div>
  <h1>
   Transliteration
  </h1>
		<a href="http://dmoz.org/World/Kannada/">कन्नड़</a>,
		<a href="http://tlt.its.psu.edu/suggestions/international/bylanguage/gujaratichart.html">गुजराती</a>, 
		<a href="http://tlt.its.psu.edu/suggestions/international/bylanguage/punjabichart.html">गुरमुखी</a>, 
		<a href="http://www.google.co.in/ta">तमिल</a>, 
		<a href="http://www.google.co.in/te">तेलुगु</a>, 
		<a href="http://www.google.co.in/bn">बाङ्ग्ला</a> 
		<a href="http://ml.wikipedia.org/wiki/Main_Page">मलयालम</a> 

	<p>	You can use this page to transliterate(not translation!) unicode scripts between languages .Use the text box to input the URL of Indian language unicode site and click on the button having the letter of the script you want to convert to,to get the site transliterated. </p>
 
    Enter URL  <input type="text" size="50" name="<?php echo $fileVar; ?>" />
    <a href="urlhelp.html">help</a>
    
   <br/><br/><br/>
   <input name="transliterate_to_button" value="अ" type="submit" class="button_style"/>    
      
   <input name="transliterate_to_button" value="অ" type="submit" class="button_style"/>
          
   <input name="transliterate_to_button" value="அ" type="submit" class="button_style"/>
      
   <input name="transliterate_to_button" value="అ" type="submit" class="button_style"/>
      
   <input name="transliterate_to_button" value="ਅ" type="submit" class="button_style"/>
      
   <input name="transliterate_to_button" value="ಅ" type="submit" class="button_style"/>
      
   <input name="transliterate_to_button" value="અ" type="submit" class="button_style"/>
      
   <input name="transliterate_to_button" value="അ" type="submit" class="button_style"/>
</div>      
</form>
</body>
</html>
