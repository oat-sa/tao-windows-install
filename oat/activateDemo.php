<?php 

$params = $argv;
array_shift($params);



if (count($params) != 1) {
	echo 'Usage: ' . __FILE__.' TAO_ROOT'.PHP_EOL;
	die(1);
}



$root = rtrim(array_shift($params), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
$loginblock = $root .'tao'.DIRECTORY_SEPARATOR.
					'views'.DIRECTORY_SEPARATOR.
					'templates'.DIRECTORY_SEPARATOR.
					'blocks' . DIRECTORY_SEPARATOR .
					'login.tpl';

if (!file_exists($loginblock)) {
    echo 'Tao not found at "'.$root.'"'.PHP_EOL;
    die(1);
}

echo 'Try to activate demo mode '. PHP_EOL; 

$commentSnippetStart = "<!-- Snippet inserted for demo mode -->";
$commentSnippetEnd = "\t<!-- End of demo mode snippet -->";
$pSnippet = '<p style="text-align:center; margin: 20px 0;" class="feedback-info small">' ;
$info = '<span class="icon-info"></span><strong>login</strong> = demo, <strong>password</strong> = demo' ;
$demoblock ='</h1>' . PHP_EOL . "\t" . $commentSnippetStart . "\n\t" . $pSnippet . "\n\t\t" . $info . "\n\t" . '</p>' . "\n" .$commentSnippetEnd;


$file_contents = file_get_contents($loginblock);

if(strpos( $file_contents, $commentSnippetStart) === false) {
	$file_contents = str_replace('</h1>',$demoblock,$file_contents);
	file_put_contents($loginblock,$file_contents);
	echo 'Demo mode activated'. PHP_EOL; 
}
else {
	echo 'Demo mode already activated'. PHP_EOL;
}
