<?php
/*
This program is free software; you can redistribute it and/or modify
under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

$base_url = "/unicode.php5?file=http://";
//base_url will be added to the sites' URL unless the sites' URL do not start
//with "http://"

$sites = array (
    "Eenadu"                 => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.eenadu.net"),
    "Andhraprabha"           => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.andhraprabha.com"),
    "Andhrajyothy"           => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.andhrajyothy.com"),
    "Webprapancham"          => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.webprapancham.com"),
    "Teluguone"              => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.teluguone.com"),
    "Shirdisaiashirvadam"    => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.shirdisaiashirvadam.org/index.htm"),
    "APWeekly"               => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.apweekly.com"),
    "Keralahistory"          => array ("Language" => "Malayalam",
                                "Status"          => "Working",
                                "URL"             => "www.keralahistory.ac.in"),
    "Deepika"                => array ("Language" => "Malayalam",
                                "Status"          => "Working",
                                "URL"             => "www.deepika.com"),
    "Mangalam"               => array ("Language" => "Malayalam",
                                "Status"          => "Not Working",
                                "URL"             => "www.mangalam.com"),
    "Vaarttha"               => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.vaarttha.com"),
    "ETV2"                   => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "etv2.net"),				
//    "Thatstelugu Indiainfo"  => array ("Language" => "Telugu",
//                                "Status"          => "Not Working",
//                                "URL"             => "thatstelugu.indiainfo.com"),
    "Thatstelugu OneIndia (now it's converted to unicode)"   => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "http://thatstelugu.oneindia.in"),
    "Thatstamil OneIndia (now it's converted to unicode)"    => array ("Language" => "Tamil",
                                "Status"          => "Working",
                                "URL"             => "http://thatstamil.oneindia.in"),
    "Thatskannada OneIndia (now it's converted to unicode)"  => array ("Language" => "Kannada",
                                "Status"          => "Working",
                                "URL"             => "http://thatskannada.oneindia.in"),
    "Thatsmalayalam OneIndia (now it's converted to unicode)" => array ("Language" => "Malayalam",
                                "Status"          => "Working",
                                "URL"             => "http://thatsmalayalam.oneindia.in"),
    "Kaburlu"                => array ("Language" => "Telugu",
                                "Status"          => "Not Working",
                                "URL"             => "www.kaburlu.com"),
    "Madhyamamonline"        => array ("Language" => "Malayalam",
                                "Status"          => "Working",
                                "URL"             => "www.madhyamamonline.in"),
    "Deshabhimani"           => array ("Language" => "Malayalam",
                                "Status"          => "Working",
                                "URL"             => "www.deshabhimani.com"),
    "Manoramaonline"         => array ("Language" => "Malayalam",
                                "Status"          => "Working",
                                "URL"             => "www.manoramaonline.com"),
//    "Esakal"                 => array ("Language" => "Devanagari",
//                                "Status"          => "Not Working",
//                                "URL"             => "www.esakal.com"),
    "Kumudam"                => array ("Language" => "Tamil",
                                "Status"          => "Working",
                                "URL"             => "www.kumudam.com"),
    "Dinamalar"              => array ("Language" => "Tamil",
                                "Status"          => "Working",
                                "URL"             => "www.dinamalar.com"),
    "Dailythanthi"           => array ("Language" => "Tamil",
                                "Status"          => "Working",
                                "URL"             => "www.dailythanthi.com"),
    "Vikatan"                => array ("Language" => "Tamil",
                                "Status"          => "Working",
                                "URL"             => "www.vikatan.com"),
    "Bhaskar"                => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "www.bhaskar.com"),
    "Jagran (now it's converted to unicode)"                 => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "http://www.jagran.com"),
    "Gujaratsamachar"        => array ("Language" => "Gujarati",
                                "Status"          => "Working",
                                "URL"             => "www.gujaratsamachar.com"),
    "Rajasthanpatrika"       => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "www.rajasthanpatrika.com"),
    "Amarujala"              => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "www.amarujala.com"),
    "Keralakaumudi"          => array ("Language" => "Malayalam",
                                "Status"          => "Working",
                                "URL"             => "www.keralakaumudi.com"),
    "APOnline (now it's converted to unicode)"               => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "http://www.aponline.gov.in"),
    "Punjabkesari"           => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "www.punjabkesari.com"),
    "Epatrika"               => array ("Language" => "Devanagari",
                                "Status"          => "Not Working",
                                "URL"             => "www.epatrika.com"),
    "Kannadaprabha"          => array ("Language" => "Kannada",
                                "Status"          => "Working",
                                "URL"             => "www.kannadaprabha.com"),
    "Telugupeople"           => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.telugupeople.com"),
    "Andhrabharati"          => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.andhrabharati.com"),
    "Bhavana"                => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "www.bhaavana.net"),
    "Mathrubhumi"            => array ("Language" => "Malayalam",
                                "Status"          => "Working",
                                "URL"             => "www.mathrubhumi.com"),				 
    "Manibhadradada"        => array ("Language" => "Gujarati",
                                "Status"          => "Working",
                                "URL"             => "www.manibhadradada.org"),
    "Rasik"                 => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "www.rasik.com"),
    "Hindustandainik"       => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "www.hindustandainik.com"),
    "Marathiworld (now it's converted to unicode)"          => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "http://www.marathiworld.com"),
    "KalaKaumudi"          => array ("Language" => "Malayalam",
                                "Status"          => "Working",
                                "URL"             => "vellinakshatram.com/kala/1662/index.asp"),
    "KeralaExpress"        => array ("Language" => "Malayalam",
                                "Status"          => "Working",
                                "URL"             => "keralaexpress.com"),
    "Nisot"                => array ("Language" => "Gurmukhi",
                                "Status"          => "Working",
                                "URL"             => "nisot.com"),
    "AmritsarTimes"        => array ("Language" => "Gurmukhi",
                                "Status"          => "Working",
                                "URL"             => "amritsartimes.com"),
    "Udayavani"            => array ("Language" => "Kannada",
                                "Status"          => "Working",
                                "URL"             => "udayavani.com"),
    " Hindustan Cables Limited"  => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "hindcables.com"),
    "Daily Kesari"              => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "dailykesari.com"),
    "NTV Telugu"                => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "ntvtelugu.com"),
    "Prabhasakshi"              => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "prabhasakshi.com"),
    "Sankhyakiya Patrika"       => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "upgov.up.nic.in/spatrika"),
    "Haribhoomi"                => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "haribhoomi.com"),
    "AnandaBazar Patrika"       => array ("Language" => "Bengali",
                                "Status"          => "Working",
                                "URL"             => "www.anandabazar.com"),
    "Netrajyoti Hospital"       => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "enetrajyoti.com"),
    "Kalamanch"       		=> array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "kalamanch.com"),
    "Pudhari"       		=> array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "pudhari.com"),
    "OmNamoVenkatesaya"     => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "omnamovenkatesaya.com"),
    "Sakshi"                => array ("Language" => "Telugu",
                                "Status"          => "Working",
                                "URL"             => "sakshi.com"),
    "Bartaman Patrika"      => array ("Language" => "Bengali",
                                "Status"          => "Working",
                                "URL"             => "bartamanpatrika.com"),
    "Lokmat"       		    => array ("Language" => "Devanagari",
                                "Status"          => "Working",
                                "URL"             => "lokmat.com"),
);

$language_columns = 4;
?>

<?php

$sites_langauges = array ();
foreach (array_keys($sites) as $site)
{
    array_push ($sites_langauges, $sites[$site]["Language"]);
}
$sites_langauges = array_unique ($sites_langauges);
sort ($sites_langauges);

print_head ();
foreach ($sites_langauges as $language)
{
    start_language ($language);
    foreach (array_keys($sites) as $site)
    {
        if ($sites[$site]["Language"] == $language)
            print_site ($site);
    }
    end_language ($language);
}
print_base ();

function print_head ()
{
print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Unicode Conversion Gateway</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8"/>
<meta http-equiv="content-style-type" content="text/css"/>
<style type="text/css">
body {
    font-family: sans;
    font-size: smaller;
}
table.main {
    width: 100%;
}
td.language {
    border-right: 1px solid #d0d0ff;
    border-bottom: 1px solid #d0d0ff;
    padding: 10px;
    margin: 50px;
    background: #f6f6ff;
}
td {
    vertical-align: top;
}
hr {
    height: 1px;
    border: dashed;
    border-width: 0px 0px 1px 0px;
}
.language_title
{
    font-size: 1.3em;
    margin: .15em;
}
</style>
</head>
<body>
<h2>Unicode Conversion Gateway</h2>
<p>Click <a href="girgit.php5"> here </a> for <b>Transliteration</b> of unicode pages.
<br />
Click <a href="fileconverterindex.php5"> here </a> for converting a file into unicode.</p>

<p>Unicode version of the following sites is available through this gateway.</p>

<table class="main" cellspacing="10">
<?php

global $language_count;
$language_count = 0;
}

function start_language ($language)
{
    global $language_count;
    global $language_columns;

    if ($language_count % $language_columns == 0)
    {
    	print "<tr>\n";
    }
    print "<td class='language'>\n";

    print "<div class='language_title'>$language</div>\n";
    print "<table>\n";
}

function end_language ()
{
    global $language_count;
    global $language_columns;

    print "</table>\n";
    print "</td>\n";

    if ($language_count % $language_columns == $language_columns -1 )
    {
    	print "</tr>\n";
    }
    $language_count = $language_count + 1;
}

function print_site ($site)
{
    global $sites, $base_url;
    $icon = "no";
    $temp_base_url = $base_url;
    if (strpos ($sites[$site]["URL"], "http://") !== false) {
         $temp_base_url = "";
    }
    if ($sites[$site]['Status'] == "Working")
    {
    	$icon = "ok";
    }
    print "<tr><td><img alt='$icon' src='images/$icon.png' /></td><td class=\"" . $class . "_head\"><a href=\"" . $temp_base_url . $sites[$site]["URL"] . "\">" . $site . "</a></td></tr>\n";
}

function print_base ()
{
    global $language_count;
    global $language_columns;
    if ($language_count % $language_columns <> 0)
    {
    	print "</tr>\n";
    }

?>
</table>
<hr />
<p>
Contact: Harshita Vani (harshita at atc dot tcs dot com)
</p>
<p>
Click <a href="http://unigateway.sourceforge.net/Main_Page">here</a> for wiki of the project.
</p>
</body>
</html>
<?php
}
?>
