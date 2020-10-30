<?php

function envoieMail ($nom, $desc)
{
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Geobiologie.com"<support@primfx.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message='
        <html>
        	<body>
        		<div align="center">
        			De : <br />'. $nom .'
        			<br />
        			Le message : <br />'. $desc .'
        		</div>
        	</body>
        </html>
        ';

        //mail("laurentisa@gmail.com", "Nouveau témoignage !", $message, $header);
        mail("rgot.sio@gmail.com", "Nouveau témoignage !", $message, $header);

}

function envoieMailContact ($nom, $desc, $mail, $sujet)
{
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Geobiologie.com"<support@primfx.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message='
        <html>
        	<body>
        		<div align="center">
        			De : <br />'. $nom .'
              <br /><br />Son mail : <br />'. $mail .'
        			<br /><br />
        			Le message : <br />'. $desc .'
        		</div>
        	</body>
        </html>
        ';
        
        //mail("laurentisa@gmail.com", "Nouveau témoignage !", $message, $header);
        mail("rgot.sio@gmail.com", $sujet, $message, $header);

}
?>
