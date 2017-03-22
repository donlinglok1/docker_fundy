<?php
function train($txtfilepath) {
	$cbow = 1;
	$size = 500;
	$window = 10;
	$negative = 10;
	$hs = 0;
	$sample = "1e-5";
	$threads = 40;
	$binary = 1;
	$iter = 3;
	$min_count = 10;
	
	exec ( "cd " . dirname ( __FILE__ ) . "/google-word2vec-trunk && ./word2vec " . " -train " . $txtfilepath . " -output " . dirname ( __FILE__ ) . "/vectors.bin " . " -cbow " . $cbow . " -size " . $size . " -window " . $window . " -negative " . $negative . " -hs " . $hs . " -sample " . $sample . " -threads " . $threads . " -binary " . $binary . " -iter " . $iter . " -min-count " . $min_count, $outputArray );
}
function distance($keyword) {
	exec ( "cd " . dirname ( __FILE__ ) . " && ./distancecli " . dirname ( __FILE__ ) . "/vectors.bin " . $keyword, $outputArray );
	if (isset ( $outputArray [0] )) {
		return $outputArray;
	} else {
		return distance ( $keyword );
	}
}

//train ( dirname ( __FILE__ ) . "/google-word2vec-trunk/questions-words.txt" );
echo json_encode ( distance ( "facebook" ), true );
?>