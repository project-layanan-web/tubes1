<!DOCTYPE html >
<html>
<head>
<title>Parsing Website Tribunnews.com</title>
<meta charset="iso-8859-1" />
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
          <div id="sidebar"> <a href="index.html"><img id="logo" src="images/logo.gif" with="154" height="74" alt="" title=""/></a>
            <ul class="navigation">
              <li><a  href="index.html">BERANDA</a></li>
              <li class="active"><a href="parsing.php">PARSING WEBSITE</a></li>
              <li><a href="blog.php">CUACA TASIK</li>  
              <li class="last"><a href="contact.php">KONTAK</a></li>
            </ul>
            <div class="connect"> <a href="http://facebook.com/saepul.pdls" class="facebook">&nbsp;</a> 
											<a href="http://twitter.com/saepul_pdl" class="twitter">&nbsp;</a> 
											
			</div>
            <div class="footenote"> <span>&copy; Copyright &copy; 2014.</span> <span>
			<a href="index.html">Saepul & Fahrul</a> all rights reserved</span> </div>
          </div>
          <div id="content">
            <div class="content">
					<div class="content">
              <ul>
                <li>  
					<center> <h1>     Berita Terkini Dari Tribunnews.com </h1></center>
						<font color="#FAAC58">
							<?php
								$html = "";
								$url = "http://www.tribunnews.com/rss"; 
								$xml = simplexml_load_file($url);
								for($i = 0; $i < 10; $i++){
								
									$title = $xml->channel->item[$i]->title;
									$link = $xml->channel->item[$i]->link;
									$description = $xml->channel->item[$i]->description;
									$pubDate = $xml->channel->item[$i]->pubDate;
									
									$html .= "<a href='$link' target='_blank'><h3><font color='#BFFF00'>$title</font></h3></a>";
									$html .= "$description<br/>";
									$html .= "<br />$pubDate<hr />";
								} 
								echo $html;
							?>
							</font>
					</li>
				  </ul>
				</div>
			  </div>
			</div>
		  </div>
		</div>
      </div>
    </div>
   <div class="shadow"> </div>
 </div>
</div>
</body>
</html>
