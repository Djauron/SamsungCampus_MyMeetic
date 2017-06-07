<?php

class email
{
	function __construct($mail,$pseudo,$key)
	{
		$this->pseudo = htmlspecialchars($pseudo);
		$this->email = $mail;

		$this->envoieMail($this->email,$this->pseudo,$key);
	}

	public function envoieMail($mail,$pseudo,$key)
	{
		$header = "MIME-Version: 1.0\r\n";
		$header.= 'From:"MyMeetic"<HereEmail>'."\n";
		$header.= 'Content-Type:text/html; charset="utf-8"'."\n";
		$header.= 'Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<a href="http://localhost/PHP_my_meetic?page=confirmation&pseudo='.$pseudo.'&key='.$key.'"> Confimez votre compte </a>
				</div>
			</body>
		</html>			
		';	

		mail($this->email, "Confimation de compte", $message, $header);
	}
}

?>