<!DOCTYPE html >
<html>

<head>
	<title>Minimalistic Web Template</title>
	<meta  charset="iso-8859-1" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<!--[if IE 6]>
		<link href="css/ie6.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<!--[if IE 7]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />  
	<![endif]-->
</head>

<body>

	  <div id="background">
			  <div id="page">
			  
					 <div class="header">
						<div class="footer">
							<div class="body">
									<div id="sidebar">
									    <a href="index.html"><img id="logo" src="images/logo.gif" with="154" height="74" alt="" title=""/></a>
										
										
											<ul class="navigation">
												<li><a  href="index.html">BERANDA</a></li>
												<li ><a href="parsing.php">PARSING WEBSITE</a></li>
												<li class="active"><a href="blog.php">CUACA TASIK</a></li>
												<li class="last"><a href="contact.php">KONTAK</a></li>
											</ul>
										 
										<div class="connect">
										     <a href="https://www.facebook.com/saepul.pdls" class="facebook">&nbsp;</a>
											<a href="http://twitter.com/saepul_pdl" class="twitter">&nbsp;</a>
											
										</div>
										 
										<div class="footenote">
										  <span>&copy; Copyright &copy; 2014.</span>
										  <span><a href="index.html">Saepul & Fahrul</a> all rights reserved</span>
										</div>
										
									</div>
									<div id="content">
									            <div class="content">
										       <ul class="article">
													<li>
													    <?php
  function startElement($parser, $name, $attrs) {
    global $insideitem, $tag, $title, $description, $link, $pubDate;
    if ($insideitem) {
      $tag = $name;
    } elseif ($name == "ITEM") {
      $insideitem = true;
    }
  }
  function endElement($parser, $name) {
    global $insideitem, $tag, $title, $description, $link, $pubDate, $i;
   if (!$i) {
      $i=1;
    }
    if (($name == "ITEM") && ($i<=5)) {
     $i++;
      printf("<h3><a href='%s' class=main target=_blank>%s</a></h3>%s<p>%s</p>",
    trim($link),trim($title), substr($pubDate,0,16), $description);
    $title = "";
    $description = "";
    $link = "";
    $pubDate="";
    $insideitem = false;
  }
}
function characterData($parser, $data) {
  global $insideitem, $tag, $title, $description, $link, $pubDate;
  if ($insideitem) {
    switch ($tag) {
    case "TITLE":
    $title .= $data;
    break;
    case "DESCRIPTION":
    $description .= $data;
    break;
    case "LINK":
    $link .= $data;
    break;
    case "PUBDATE":
    $pubDate .= $data;
    break;
    }
  }
  }
  $insideitem = false;
  $tag = "";
  $title = "";
  $description = "";
  $link = "";
  $pubDate ="";
  $xml_parser = xml_parser_create();
  xml_set_element_handler($xml_parser, "startElement", "endElement");
  xml_set_character_data_handler($xml_parser, "characterData");
  $fp = fopen("http://weather.yahooapis.com/forecastrss?w=1048554&u=c","r"); 
  while ($datarss = fread($fp, 4096)) 
    xml_parse($xml_parser, $datarss, feof($fp))
  or die(sprintf("XML error: %s pada baris %d", 
  xml_error_string(xml_get_error_code($xml_parser)), 
  xml_get_current_line_number($xml_parser)));
  fclose($fp);
  xml_parser_free($xml_parser); 
  ?>
													</li>
													
											   </ul>
										</div>
									</div>
							</div>
						</div>
					 </div>
					 <div class="shadow">
					 </div>
			  </div>    
	  </div>    
	
</body>
</html>
