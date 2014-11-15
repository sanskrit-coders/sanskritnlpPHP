<?
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

global $mime_dl;
global $server;
global $redirectIP;
global $fileVar;
global $encryptPage;
global $transliteration_flag;

/*
Should we try to send all files as 
download by default or proxy them normally? 
*/
$download_files_by_default = false;

/*Mime Types***********************\
* These are mime types you don't   *
* want to have downloaded by       *
* default (false is required)      *
\**********************************/
$dont_download_mimes = Array(
    "text/html"       => false,
    "application/pdf" => false,
    "application/x-javascript"      => false,
    "application/x-shockwave-flash" => false,
    "image/bmp"       => false,
    "image/gif"       => false,
    "image/jpeg"      => false,
    "image/tiff"      => false,
    "text/css"        => false,
    "text/directory"  => false,
    "text/plain"      => false
);

/*Server Vars***********************\
* Change these to match your server *
* Comment out redirectIP to have    *
* the proxy work on all ips (by     *
* absolute URLs)                    *
\***********************************/
$server = "http://sanskritnlp.appspot.com/unicodify";
#$server = "http://localhost/proxy";

#$redirectIP = "";
$fileVar="file";

/*
Not all sites tell us their character encoding. 
Sometimes we better hardcode the encoding 
instead of trying to auto-detect the encodoing.
*/
//site name match "/*[\.]{0,1}kaburlu\.*/"
$content_encodings = Array(
    "kaburlu.com" => "utf-8",
    "punjabkesari.com" => "utf-8",
    "telugupeople.com" => "utf-8",
    "bhaskar.com" => "utf-8",
    "bhumika.org" => "iso-8859-1",
    "prabhasakshi.com" => "utf-8",
    "pudhari.com" => "utf-8",
    "omnamovenkatesaya.com" => "utf-8", 
    "sakshi.com" => "utf-8",
    "bartamanpatrika.com" => "iso-8859-1",
);

/*
If we are not able to get the encoding from the 
site and don't find the site listed in the above
list, we simply have assume a character encoding.
*/
$default_character_encoding = "windows-1252";

//assumption: one font per website and all supported elements(class, tag, id) 
//of a particular website use that font
//(while giving support for multiple fonts per site, map the fonts to 
//different classes, tags and ids)
$supported_fonts = Array(
    "thatstelugu.oneindia.in" => "shree-tel-0900",
    "webprapancham.com" => "shree-tel-0900",
    "andhrajyothy.com" => "shree-tel-0900",
    "shirdisaiashirvadam.org" => "shree-tel-0902",
    "thatstamil.oneindia.in" => "shree-tam-0802",
    "thatskannada.oneindia.in" => "shree-kan-0850",
    "kaburlu.com" => "telugu lipi",
    "eenadu.net" => "eenadu",
    "vikatan.com" => "vikatan_tam",
    "vaarttha.com" => "vaartha",
    "andhraprabha.com" => "tlw-tthemalatha",
    "apweekly.com" => "tlw-tthemalatha",
    "dailythanthi.com" => "elango-tml-panchali-normal",
    "kumudam.com" => "kumudam",
    "kannadaprabha.com" => "knw-ttnandi",
    "keralahistory.ac.in" => "ml-ttkarthika",
    "deepika.com" => "ml-ttkarthika",
    "mangalam.com" => "ml-ttkarthika",
    "gujaratsamachar.com" => "gopika",
    "dinamalar.com" => "shree-tam-0802",
    "deshabhimani.com" => "mlw-ttrevathi",
    "manoramaonline.com"=>"manorama",
    "keralakaumudi.com"=>"thoolika",
    "esakal.com"=>"usubak",
    "bhaskar.com"=>"bhaskar",
    "rajasthanpatrika.com"=>"epatrika",
    "amarujala.com"=>"au",
    "punjabkesari.com"=>"chanakya",
    "thatsmalayalam.oneindia.in" => "shree-mal-0501",
    "madhyamamonline.in" => "panchami",
    "etv2.net" => "eenadu",
    "andhrabharati.com" => "suritlr",
    "telugupeople.com"=>"telugufont",
    "aponline.gov.in" => "tcsmith",
    "bhaavana.net" => "tikkana",
    "mathrubhumi.com" => "matweb",
    "teluguone.com" => "tl-tthemalatha",
    "manibhadradada.org" => "vakil_01",
    "rasik.com" => "shivaji01",
    "hindustandainik.com" => "htchanakya",
    "marathiworld.com" => "marmith0",
    "bhumika.org" => "priyaanka",
    "valamwebsite" => "tscu_inaimathi",
    "openknowledgenetwork" => "tscu_inaimathi",
    "vellinakshatram.com" => "kalakaumudi",
    "keralaexpress.com" => "ml-ttkarthika",
    "nisot.com" => "drchatrikweb",
    "amritsartimes.com" => "drchatrikweb",
    "udayavani.com" => "shree-kan-0850",
    "hindcables.com" => "dv-ttsurekhen",
    "dailykesari.com" => "manjusha",
    "ntvtelugu.com" => "tlw-tthemalatha",
    "prabhasakshi.com" => "kruti dev 010",
    "enetrajyoti.com" => "kiran",
    "kalamanch.com" => "kiran",
    "pudhari.com" => "shree-pudhari",
    "lokmat.com" => "millenniumvarunweb",
    "omnamovenkatesaya.com" => "vikaaswebfont",
    "sakshi.com" => "shree-0908w",
    );

$supported_tags = Array(
    "andhrajyothy.com" => Array(
        "p",
        "h1",
        "h5",
        "h6"
    ),
    "kumudam.com" => Array(
        "p",
    	"pre",
    	"marquee"
    ),
    "keralakaumudi.com" => Array(
    	"a"
    ),
    "bhumika.org" => Array(
    	"title"
    ),
    "valamwebsite" => Array (
    	"body",
    	"p",
    	"input",
    	"textarea",
    	"select",
    	"checkbox",
    	"button",
    	"submit"
    ),
    "udayavani.com" => Array(
    	"h1"
    ),
    "pudhari.com" => Array(
    	"a"
    ),
);

$unsupported_tags = Array(
    "thatstelugu.oneindia.in" => Array(
        "body",
        "script",
        "style"
    ),
    "thatstamil.oneindia.in" => Array(
        "body",
        "script",
        "style"
    ),
    "thatskannada.oneindia.in" => Array(
        "body",
        "script",
        "style"
    ),
    "thatsmalayalam.oneindia.in" => Array(
        "body",
        "script",
        "style"
    ),
    "vikatan.com" => Array(
        "script",
        "style"
    ),
    "andhrajyothy.com" => Array(
        "script",
        "style",
        "select"
    ),
    "vaarttha.com" => Array(
        "script",
        "style"
    ),
    "teluguone.com" => Array(
    	"a"
    ),
    "udayavani.com" => Array(
    	"body"
    ),
    "ntvtelugu.com" => Array(
    	"a",
    	"input",
    	"textarea"
    ),
    "pudhari.com" => Array(
    	"h1",
	    "h2"
    ),
    "sakshi.com" => Array(
        "ul",
        "body"
    ),
);

$supported_classes = Array(
    "thatstelugu.oneindia.in" => Array(
        "nl",
        "lg",
        "head-tel",
        "newshead",
        "headline",
        "top-head",
        "top-head1",
        "inner",
        "cine-inner",
        "red-txt",
	    "mnormal2"
    ),
    "thatstamil.oneindia.in" => Array(
        "rs",
        "tamfont1",
        "tamfont2",
        "tamfont3",
        "tamfont4",
        "tamfont5",
        "tamfont6"
    ),
    "thatskannada.oneindia.in" => Array(
        "kanfont1",
        "kanfont2",
        "kanfont3",
        "kanfont4",
        "kanfont5",
        "kanfont6",
        "kanfont7",
        "firefox",
        "firefox1"
    ),
    "thatsmalayalam.oneindia.in" => Array(
        "mnormal",
        "mnormal2",
        "mnormal3"
    ),
    "andhrajyothy.com" => Array(
        "heading",
        "h11"
    ),
    "vikatan.com" => Array(
        "block_color_bodytext",
        "redcolorbodytext",
        "brown_color_bodytext",
        "block_color_heading"
    ),
    "deepika.com" => Array(
        "dpklinksmallu",
        "cat2links",
        "cat2linksinside",
        "cat3links",
        "cat4links",
        "cat5links",
        "cat6links",
        "dpklinksmalluins",
        "mainnewsmal",
        "malluhometblhd",
        "malluhometbllnk",
        "malhomelnk2",
        "maltext",
        "malhdwhite",
        "maltext01",
        "maltext02",
        "malhomecitibank1",
        "advtlinks"
    ),
    "mangalam.com" => Array(
        "mangalam"
    ),
    "kumudam.com" => Array(
        "blacknk",
    	"kumudamred",
    	"kumudamblack",
    	"kumudamblue",
    	"kumudamblackleft",
    	"kumudamblackleft1",
    	"kumudamblack1",
    	"kumudamorange",
    	"kumudamgrey",
    	"kumudamwhite",
    	"kumudamblacktxt",
    	"txtboxk",
    	"kumudamorange18",
    	"kumlink",
    	"kumredlink",
    	"kumgrey",
    	"textnews"
    ),
    "rajasthanpatrika.com" => Array(
      	"hindigraysmall",
      	"hindihead1",
      	"hindihead2",
      	"hindihead3",
      	"hindihead4",
      	"hindihead5",
      	"hindirunning",
      	"hindirunningblue",
      	"hindiwhite",
      	"hindihomeLinks",
      	"hinditicker",
      	"hinditicker1",
      	"hinditicker3",
      	"hindismall",
      	"hindifirstchar",
      	"hindigraysmall",
      	"hindihead3red",
      	"hindirunningred",
      	"hindinew123"
    ),
    "madhyamamonline.in" => Array(
        "malayalam",
        "malayalamtext",
        "normalnews",
        "latestnewslink",
        "malayalamhead",
        "malayalamlink",
        "malayalamnavin",
        "malayalamnavib",
        "malayalamnavim",
        "malayalamnavimd",
        "cont",
        "boxnewslink",
        "flashnewslink",
        "malayalamwhite",
        "newslink",
        "poll",
        "archive"
    ),
    "keralakaumudi.com" => Array(
        "byline",
        "menu",
        "head2",
        "hsport",
        "hworld",
        "hbuz",
        "hindia",
        "hkerala",
        "hcity",
        "shead",
        "caption",
        "body",
        "black"
    ),
        "manoramaonline.com" => Array(
    	"maltd",
    	"maltdt2",
    	"maltdt3",
    	"maltdt4",
    	"maltdt3a",
    	"maltda",
    	"maltdat2",
    	"maltdhead",
    	"maltdheada",
    	"maltdheadt2",
    	"centerhead",
        "chshwcasehdmal",
    	"chshwcasemal001",
    	"malleft001",
    	"blueboldmal",
    	"malcomlink",
    	"bluebox",
    	"mmbold",
    	"mmnormal",
    	"malblack",
    	"malylates",
    	"malfont",
    	"malfont1",
    	"malfont2",
    	"malfont3",
    	"malfontcb",
    	"malfont66",
    	"malfont16",
    	"mal14grey",
    	"mal16grey",
    	"malleft",
    	"mal14black",
    	"mal14grey1",
    	"mal14white",
    	"mal14blue",
    	"mal12white",
    	"mal12red",
    	"mal27red",
    	"mal12",
    	"mal14",
    	"mal16",
    	"mal18",
    	"mal20",
    	"malwhitebg",
    	"maldbluebg",
    	"malbluebg",
    	"malbluebg1",
    	"mal14greybg",
    	"malblue",
    	"malcorrespond",
    	"malblack",
    	"malblue1",
    	"mal18blue",
    	"mal16blue",
    	"mal16white",
    	"mal16black",
    	"malwhite",
    	"mal16black",
    	"malwhite",
    	"mal18c66",
    	"mal27c66",
    	"malh18",
    	"mal20black",
    	"mal20blue",
    	"mal15black",
    	"mal12blue",
    	"mal16blue1",
    	"malwomen",
    	"mal1414",
    	"select12",
    	"blocklnkhdonem",
    	"blocklnkhdonemwhite",
    	"chshwcasehdmal",
    	"chshwcasecontentmal",
    	"chshwcaseotherhdlineslinkm",
    	"chshwcasehdlineslinkm",
    	"breadcrumbsm",
    	"breadcrumbsmnb",
    	"channelnamem",
    	"channelnamemlink",
    	"sectioncontainer",
    	"sectionblockalt",
    	"sectionblock",
    	"articlecontentm",
    	"articlehdm",
    	"topstoryhdmal",
    	"listm",
    	"listmb",
    	"homemanblock",
    	"maltxtone",
    	"maltxttwo",
    	"malhead",
    	"malsechead",
    	"malbody",
    	"manorama",
    	"spl_linkarea",
    	"link22",
    	"link18",
    	"link19",
    	"link26",
    	"link53",
    	"leftmal"
    ),
    "punjabkesari.com" => Array(
        "chank",
        "chank1"
    ),
    "mathrubhumi.com" => Array(
        "pagehead",
        "featurehead",
        "mattextnewshead",
        "matnewshead",
        "lnkastro",
        "paramparahead",
        "updatedmat",
        "newshead",
        "matnewsheadhome",
        "news",
        "continue",
        "rightheadtxt",
        "sidelinks",
        "toplinks",
        "mainnewshead",
        "mainnews",
        "mattext",
        "regionalhead",
        "mattextb",
        "mattextnews",
        "today",
        "scrollingtextmat",
        "continuesubnews",
        "continuehome",
        "matnewshead1",
        "internallnktext",
        "tempraturem",
        "mattextsmall",
        "mattextsmall10",
        "mattextphotocaption",
        "matbtn",
        "leftheadtxt",
        "normaltextmal",
        "scoresm"
    ),
    "teluguone.com" => Array(
    	"telugu",
    	"telugu_white",
    	"tone",
    	"telugu1",
    	"telugu20",
    	"f11telugu",
    	"f12telugu"
    ),
    "hindustandainik.com" => Array(
        "bd",
        "bdbig",
        "bdbo",
        "bl",
        "bdbobl",
        "rdln",
        "bllnsm",
        "bllnsmbig",
        "blln",
        "gr",
        "wh",
        "whbig",
        "whsm",
        "hd1",
        "hd2",
        "hdbl2",
        "hd3",
        "rdhd",
        "rdhdbig",
        "bkhd1",
        "bkhd2",
        "fullcov",
        "fullcovsm",
        "htnw",
        "hiformfield",
        "bdbggr18"
    ),
    "valamwebsite" => Array (
        "ram"
    ),
    "openknowledgenetwork" => Array (
        "msobodytextindent",
        "msobodytext2",
        "msobodytext"
    ),
    "amritsartimes.com" => Array(
        "pbi",
        "punjabi",
        "punjabibold",
        "punjabi2",
        "punjabi3"
    ),
    "udayavani.com" => Array(
    	"darkbg",
    	"darkbgsmall",
    	"heading",
    	"headline",
    	"smallheadline",
    	"content",
    	"greenbg",
    	"whitebg",
    	"whitebgsmall",
    	"yellowbg",
    	"roopatara",
    	"caption",
    	"more",
    	"orange",
    	"commonleft",
    	"date",
    	"homeorange",
    	"poll",
    	"kannada",
    	"kannadah1"
    ),
    "ntvtelugu.com" => Array(
    	"scrolling",
    	"telugu",
    	"teluguhdd"
    ),
    "kalamanch.com" => Array(
    	"aartifont",
    	"kiranfont"
    ),
    "pudhari.com" => Array(
    	"news",
    	"news1",
    	"textfont",
    	"date",
    	"pudharitext",
    	"pudharitext2",
    	"featuretext",
    	"featuretext2",
    	"polltext",
    	"redtext",
    	"blackhref",
    	"wlink",
    	"form",
    	"button",
    	"tabcontent",
    	"newscountlabel"
    ),
    "sakshi.com" => Array(
        "rednote_interview",
        "rednote_flash",
        "date2_tel",
        "main_link_a_tel",
        "main_link_tel",
        "hdr_white_tel",
        "hdr_white_tel2",
        "hdr_blue_tel",
        "hdr_blue_telnew",
        "hdr_blue_tel2",
        "hdr_pink_tel",
        "hdr_pink_tel2",
        "hdr_black_big_tel",
        "hdr_black_big_tel2",
        "rednote",
        "hdr_blue1_tel",
        "hdr_black_big_telhead",
        "hdr_black_weather",
        "body_text_tel",
        "body_tel",
        "body_text_bold",
        "body_text_bold_tel",
        "breadcrumbs_features_tel",
        "breadcrumbs_tel",
        "breadcrumbsarow_tel",
        "hdr_orange_tel",
        "small_boxbg_cream_tel",
        "rednote_listings",
        "hdr_blue1_details_tel",
        "hdr_black_big_listings_tel",
        "hdr_black_big_details_tel",
        "hdr_pink_listings_tel2",
    ), 
);

$unsupported_classes = Array(
    "thatstelugu.oneindia.in" => Array(
        "nle",
        "date",
        "eng-home",
        "bord",
        "eng",
        "engtxt",
        "fotfont",
        "ii9",
        "fotf1",
        "newchannel",
        "oneindia",
        "oneindiaheadline",
        "oi2",
        "mail",
        "poll"
    ),
    "thatstamil.oneindia.in" => Array(
        "ii2",
        "fotfont",
        "ii9",
        "gr1",
        "fotf1",
        "newchannel",
        "oneindia",
        "oneindiaheadline",
        "oi2",
        "mail",
        "poll"
    ),
    "thatskannada.oneindia.in" => Array(
        "fotfont",
        "ii9",
        "gr1",
        "fotf1",
        "newchannel",
        "oi2",
        "mail",
        "shop",
        "eng",
        "eng1",
        "eng2"
    ),
    "thatsmalayalam.oneindia.in" => Array(
        "enormal",
        "anormal",
        "newchannel",
        "list",
        "oi2",
        "mail",
        "oneindia",
        "oneindiaheadline",
        "poll",
        "fotfont",
        "ii9",
        "gr1",
        "fotf1"
    ),
    "andhrajyothy.com" => Array(
        "en",
        "links",
        "textlinks",
        "mid-line",
        "date" 
    ),
    "vikatan.com" => Array(
        "copyright",
        "updated_time",
        "black_english",
        "redcolor_english_text",
        "bluecolor_english_text",
        "updatedtimeblack",
        "back"
    ),
    "deepika.com" => Array(
        "toplinks",
        "simplelinks",
        "dpklinks",
        "menulinks",
        "latdetails",
        "engtext",
        "formfields",
        "buttons",
        "buttonsgrey",
        "pollbuttons",
        "imptext",
        "wishgreet",
        "tabletext",
        "tabletext1",
        "googlesearch"
    ),
    "mangalam.com" => Array(
        "name",
        "normal",
        "value",
        "h1",
        "head",
        "subtitle"
    ),
    "kumudam.com" => Array(
        "txtbox",
        "txtboxread",
    	"boldblklink",
    	"prevnext",
    	"blklink",
    	"boldred",
    	"boldblack",
    	"navyblue",
    	"black",
    	"black12",
    	"blackn",
    	"blue",
    	"blackbig",
    	"white",
    	"greybig ",
    	"whitesmall ",
    	"grey",
    	"grey9",
    	"whiteb",
    	"gline",
    	"glinestrike",
    	"gline1",
    	"welcome",
    	"user",
    	"subhead",
    	"heading",
    	"inheadcenter",
    	"inheadleft",
    	"engwhite",
    	"blacktext",
    	"blacktext1"
    ),
   "rajasthanpatrika.com" => Array(
        "button",
        "head1",
        "head2",
        "head3",
        "running",
        "runningred",
        "small",
        "astrohead1",
        "astrohead2",
        "astrohead3",
        "astrorunning",
        "astrosmall",
        "englishhead",
        "red_bold_hd",
        "sml_reg_wht",
        "sml_reg_bk"
    ),
    "madhyamamonline.in" => Array(
     	"date",
     	"topnewstable",
     	"topnewstablenoborder",
     	"normallink",
     	"normaltext",
     	"lowheight",
     	"time",
     	"blacklink",
     	"blackheadbold",
     	"blacktext"
     ),
    "keralakaumudi.com" => Array(
        "menub",
        "menue",
        "links"
    ),
    "manoramaonline.com" => Array(
    	"engtd",
    	"engtda",
    	"engtdat2",
    	"engtdt2",
    	"engtdt3",
    	"engtdt3a",
    	"tbl1td",
    	"tbl1tda",
    	"tbl1tdt2",
    	"tbl1tdt2a",
    	"tbl1tdt3",
    	"tbl1tdt3a",
    	"myinput",
    	"mybtn",
    	"tbl3lnkt1a",
    	"tbl3lnkt2a",
    	"classifiedshead",
    	"classifiedsheada",
    	"classifiedslnk",
    	"classifiedslnka",
    	"opthead",
    	"travelhead",
    	"classifiedsheadt2",
    	"footertd",
    	"footertda",
    	"copyritetd",
    	"centerdot",
    	"centerdott2",
    	"latestnewshead",
    	"centermidhead",
    	"emarthead",
    	"sc",
    	"yellowbg001",
    	"classifiedbg001",
    	"engcomlink",
    	"comlink",
    	"times14black001",
    	"gobtn",
    	"bluefont",
    	"bluenormal",
    	"redfont",
    	"whitefontbold",
    	"whitefontnormal",
    	"inputtextstyle",
    	"comverdanalink",
    	"updatedate",
    	"topfont01",
    	"topfont02",
    	"mmcssr",
    	"topfont",
    	"topfontverdana",
    	"verdanabold",
    	"verdananormal",
    	"times",
    	"timesbold",
        "tophead",
    	"footer",
    	"footer1",
    	"footer2",
    	"date",
    	"cuisineart",
    	"cuisineartbold",
    	"redarrow",
    	"arial18arrow",
    	"ver16arrow",
    	"multimedia",
    	"greybul",
    	"greybul1",
    	"news",
    	"news1",
    	"news2",
    	"articlehead",
    	"articlehead1",
    	"articlestory",
    	"sizeofmanoremart",
    	"dis1",
    	"travelseardest",
    	"discui",
    	"dis12",
    	"leftnav1",
    	"v1",
    	"v2",
    	"white2",
    	"arial2",
    	"register2",
    	"register1",
    	"ver10blue",
    	"ver10blue2",
    	"ver10blue3",
    	"ver10blue4",
    	"ver10blue5",
    	"ver10blue6",
    	"ver10green",
    	"ver10bluebg",
    	"ver10brown",
    	"ver9red",
    	"ver9grey",
    	"ver12grey",
    	"ver12grey1",
    	"ver10red",
    	"ver8",
    	"ver9",
    	"ver15",
    	"ver9blue",
    	"ver10",
    	"ver11",
    	"ver11h18",
    	"ver11red",
    	"ver11grey",
    	"ver12",
    	"fv00",
    	"ver16white",
    	"ver16",
    	"ver18",
    	"ver20",
    	"ver12blue4",
    	"ver12blue1",
    	"ver12blue2",
    	"ver12white",
    	"ver13",
    	"ver13blue",
    	"ver18white",
    	"ver13white",
    	"ver10grey",
    	"ver10grey1",
    	"ver10grey2",
    	"ver10grey3",
    	"ver10green",
    	"ver10green1",
    	"ver10dyellow",
    	"ver10yellow",
    	"ver10blue",
    	"ver10pink",
    	"ver10dblue",
    	"ver14",
    	"ver14grey",
    	"ver14red",
    	"ver11orange",
    	"ver10white",
    	"ver11white",
    	"ver11lblue",
    	"ver14white",
    	"ver14green",
    	"arr",
    	"ver11blue",
    	"ver11blue2",
    	"ver11blue3",
    	"ver11blue4",
    	"ver11blue5",
    	"ver11blue6",
    	"ver10red",
    	"ver11black",
    	"ver10black",
    	"ver10lh16",
    	"ver16cff",
    	"ver12blue",
    	"ver12black",
    	"ver14black",
    	"ver20black",
    	"ver11green",
    	"ver20grey",
    	"ver18blue",
    	"ver14blue",
    	"tcom",
    	"ver10blue7",
    	"ver14grey",
    	"times14dbluebg",
    	"times14bluebg",
    	"times14bluebg1",
    	"times14bluebg2",
    	"times14bluebg3",
    	"times14h20white",
    	"times12whitebg",
    	"times13whitebg",
    	"times12emart",
    	"tnr12",
    	"travotheadl",
    	"times12blue",
    	"times12blue",
    	"times12blue1",
    	"times12blue2",
    	"times12red",
    	"times12grey",
    	"times14greybg",
    	"times10black",
    	"times12",
    	"times13",
    	"times14",
    	"times14black",
    	"times13black",
    	"times12black",
    	"times12emart",
    	"times11black",
    	"times12blue3",
    	"times15",
    	"times14white",
    	"times14header",
    	"times14white1",
    	"times14orange",
    	"times14h20grey",
    	"times14h20grey1",
    	"times14h20orange1",
    	"times14h20blue",
    	"times14h20blue1",
    	"times14h20blue2",
    	"times14h20blue3",
    	"times14h20dblue",
    	"times14h20green",
    	"times14h20black",
    	"times14h20orange",
    	"times16",
    	"times16red",
    	"times20",
    	"times20blue",
    	"times20white",
    	"times16blue2",
    	"times16grey",
    	"times16orange",
    	"times18blue",
    	"times18white",
    	"times13blue",
    	"times14blue",
    	"times14blue1",
    	"times14blue2",
    	"times14blue3",
    	"times14blue4",
    	"times14blue5",
    	"times14blue6",
    	"times14blue7",
    	"times14red",
    	"times14h20",
    	"times16blue1",
    	"times16blue",
    	"home",
    	"htorea",
    	"hotra ",
    	"arial11",
    	"arial13",
    	"arial14",
    	"arial11black",
    	"arial14grey",
    	"arial11white",
    	"arial11bg1",
    	"arial11bg2",
    	"arial11bg3",
    	"arial11bg4",
    	"arial11bg5",
    	"arial11bg6",
    	"footermm",
    	"inputbox",
    	"inputbox1",
    	"inputbox2",
    	"inputbox3",
    	"inputbox4",
    	"inputbox5",
    	"inputbox6",
    	"inputbox7",
    	"inputbox8",
    	"inputbox9",
    	"inputbox10",
    	"inputbox11",
    	"inputbox12",
    	"select1",
    	"select2",
    	"select3",
    	"select4",
    	"select5",
    	"select6",
    	"select7",
    	"select8",
    	"select9",
    	"select10",
    	"select11",
    	"textarea1",
    	"textarea2",
    	"textarea3",
    	"browse",
    	"browse1",
    	"submitbtn1",
    	"submitbtn2",
    	"submitbtn3",
    	"submitbtn4",
    	"submitbtn5",
    	"submitbtn6",
    	"submitbtn7",
    	"submitbtn8",
    	"submitbtn9",
    	"submitbtn10",
    	"submitbtn11",
    	"submitbtn12",
    	"gobtn",
    	"gobtn2",
    	"gobtn3",
    	"gobtn4",
    	"gobtn5",
    	"gobtn6",
    	"gobtn7",
    	"gobtn8",
    	"gobtn9",
    	"gobtn10",
    	"gobtn11",
    	"gobtn12",
    	"articledate",
    	"blocklnkhdonee",
    	"blocklnkhdoneewhite",
    	"chshwcasehdeng",
    	"chshwcasecontenteng",
    	"chshwcasecontentengalt",
    	"chshwcasecontentengtravel",
    	"chshwcasehdlineslinke",
    	"chshwcaseotherhdlineslinke",
    	"chshwcaseothermore",
    	"breadcrumbse",
    	"breadcrumbsenb",
    	"channelnamee",
    	"articlead",
    	"articlecontente",
    	"articlehde",
    	"articlecorrespondent",
    	"articlerating",
    	"articleratingfoot",
    	"newshdtime",
    	"topmenu",
    	"topmenubold",
    	"topconsolel",
    	"topconsolelnkbold",
    	"topconsolelnk",
    	"topconsoles",
    	"topconsolee",
    	"updatedate",
    	"latestnewshead",
    	"problockhd",
    	"problocktxt",
    	"sectioncontainereng",
    	"chshwcasehdeng",
    	"chshwcasehdengalt",
    	"chshwcasetophdeng",
    	"engtxtone",
    	"travelmsgone",
    	"times16black",
    	"emarthome",
    	"link1",
    	"link3",
    	"link4444",
    	"link5",
    	"link7",
    	"link8",
    	"link9",
    	"link10",
    	"link11",
    	"link12",
    	"link13",
    	"link14",
    	"link20",
    	"link21",
    	"link22",
    	"link23",
    	"link24",
    	"link25",
    	"link27",
    	"link28",
    	"link29",
    	"link30",
    	"link31",
    	"link32",
    	"link33",
    	"link34",
    	"link35",
    	"link36",
    	"link37",
    	"link38",
    	"link39",
    	"link40",
    	"link41",
    	"link42",
    	"link43",
    	"link44",
    	"link45",
    	"link46",
    	"link47",
    	"link48",
    	"link49",
    	"link50",
    	"link51",
    	"link52",
    	"link54",
    	"link55",
    	"link56",
    	"link57",
    	"footerl",
    	"lefteng",
    	"link58",
    	"link59",
    	"link60",
    	"link61",
    	"link62",
    	"link63",
    	"link64",
    	"link65",
    	"link66",
    	"link67",
    	"link68",
    	"link69",
    	"link70",
    	"link71"
    ),
    "punjabkesari.com" => Array(
    	"ind_pk",
    	"blue",
    	"red",
    	"red1",
    	"red2",
    	"blue1",
    	"red3",
    	"b2",
    	"white"
    ),
    "mathrubhumi.com" => Array(
        "matonline",
        "updated",
        "scrollingtext",
        "minportalhome",
        "minportalsub",
        "temprature",
        "todayshome",
        "bottomlinks",
        "bottomlinksbgr",
        "headlinks",
        "errortext",
        "normaltext",
        "normaltextmal",
        "normaltextsmall",
        "discusstext",
        "whitetext",
        "copyright",
        "subscriptionsmall",
        "usefulhead",
        "usefultext",
        "faqhead",
        "faqmatter",
        "pageheadeng",
        "searchtext",
        "matonlineph",
        "phototext",
        "copyrighttext",
        "score",
        "topscore",
        "textscore",
        "currentscore",
        "statusscore",
        "innings",
        "detailscores",
        "scorehead",
        "scores",
        "normalbtntext",
        "btntext",
        "btncolor",
        "engbtn",
        "bullet",
        "treeviewspanarea",
        "currenttime",
        "lastupdated"
    ),
    "teluguone.com" => Array(
        "index",
        "text",
        "red",
        "episode",
        "listen",
        "white",
        "navigation",
        "inputbox",
        "headding",
        "arrows",
        "text1",
        "articles",
        "style4",
        "tonesearchbutton"
    ),
    "hindustandainik.com" => Array(
        "gl",
        "bde",
        "bdboe",
        "ble",
        "bllne",
        "gre",
        "whe",
        "whsme",
        "hd1e",
        "hd2e",
        "hdbl2e",
        "hd3e",
        "rdhde",
        "bkhd1e",
        "bkhd2e",
        "b",
        "htnwe",
    ),
    "amritsartimes.com" => Array(
        "black",
        "blackbold",
        "darkblue",
        "darkbluebold",
        "darkbluesmall",
        "red",
        "redbold",
        "redboldextra",
        "white",
        "whitebold",
        "darkmeroon",
        "darkmeroonbold",
        "darkmeroonsmall",
        "gray",
        "graybold",
        "graysmall",
        "grayfooter",
        "lightred",
        "lightredbold",
        "lightredsmall",
        "form",
        "table",
        "verdanablack"
    ),
    "udayavani.com" => Array(
    	"error",
    	"englishtable",
    	"englishbig",
    	"green",
    	"help",
    	"homepanel",
    	"inpt",
    	"englishlogin",
    	"style7",
    	"style8"
    ),
    "ntvtelugu.com" => Array(
    	"copyright",
    	"poweredby",
    	"homecontent",
    	"heddng",
    	"normal",
    	"trheaders",
    	"error",
    	"tblerror"
    ),
    "pudhari.com" => Array(
    	"guest",
        "blacktext",
        "table_heading",
        "table_row",
        "form1"
    ),
    "sakshi.com" => Array(
        "date_band",
        "date",
        "date2",
        "date1",
        "date_text",
        "date_text1",
        "div_line",
        "banner_text",
        "banner_text1",
        "main_link_a",
        "main_link",
        "top_banner_text",
        "hdr_white",
        "hdr_blue",
        "hdr_blue1",
        "hdr_pink",
        "hdr_black_big",
        "hdr_black",
        "body_text_blue",
        "body_text",
        "body_text_bold",
        "leftmenu_link",
        "link_pink",
        "breadcrumbs",
        "breadcrumbs_features",
        "breadcrumbs1",
        "breadcrumbsarow",
        "formtextbox",
        "formtext",
        "star",
        "submit_button",
        "home_hdr",
        "copyright",
        "hdr_orange",
        "utilty_links_a",
        "ajax__tab_saakshi",
        "ajax__tab_header",
        "ajax__tab_saakshi",
        "ajax__tab_body",
    ),
);

$supported_ids = Array(
    "manoramaonline.com" => Array(
    	"bluebox",
    	"blueboxeng"
    ),
    "udayavani.com" => Array(
    	"kannada"	 
    ),
    "pudhari.com" => Array(
    	"mainnavtabbed1"
    )
);

$unsupported_ids = Array(
    "mangalam.com" => Array(
    	"s1",
    	"p2",
    	"s2",
    	"s3",
    	"s4"
    ),
    "manoramaonline.com" => Array(
    	"classifiedbg001",
    	"greybg001",
    	"googleblock001",
    	"otherservicesbg",
    	"symbolbox001"
    )
);

$single_tags = Array(
    "br",
    "img",
    "hr",
    "meta",
    "base",
    "link",
    "dt",
    "dd",
    "embed",
    "colgroup",
    "frame",
    "input",
    "wbr"
);

$remove_attr_from_tags = Array (
    "p",
    "td",
    "div"
);
$font_name_aliases = Array (
   "priyaankabold" => "priyaanka",
   "anupamabold" => "priyaanka",
   "ramanabrush" => "priyaanka",
   "ramanascript" => "priyaanka",
   "ramanascriptmedium" => "priyaanka",
   "kranthi" => "priyaanka",
   "brahma" => "priyaanka",
   "dv-ttsurekh" => "dv-ttganesh",
   "dv-ttyogesh" => "dv-ttganesh",
   "dv-ttganeshen" => "dv-ttganesh",
   "dv-ttsurekhen" => "dv-ttganesh",
   "dv-ttyogeshen" => "dv-ttganesh",
   "manjushamedium" => "manjusha",
   "manjushabold" => "manjusha",
   "amruta" => "kiran",
   "aarti"  => "kiran",
   "shree-pud-77bl" => "shree-pudhari",
   "shree-pud-77nl" => "shree-pudhari",
   "shree-pud-77nw" => "shree-pudhari",
   "shree-kan-0850w" => "shree-kan-0850", 
   "priyaankaboldwebfont" => "vikaaswebfont",
   "pallaviboldwebfont" => "vikaaswebfont",
);

?>
