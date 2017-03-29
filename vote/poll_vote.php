<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];
$maybe = $array[2];

if ($vote == 0) {
    $yes = $yes + 1;
}
if ($vote == 1) {
    $no = $no + 1;
}
if($vote == 2){
    $maybe = $maybe + 1;
}

//insert votes to txt file
$insertvote = $yes."||".$no."||".$maybe;;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
echo 'Aantal stemmen voor liedje 1: '.$yes.'<br>';
echo 'Aantal stemmen voor liedje 2: '.$no.'<br>';
echo 'Aantal stemmen voor liedje 3: '.$maybe.'<br>';
?>

<h2>Result:</h2>
<table>
    <tr>
        <td>Liedje 1:</td>
        <td>
            <img src="poll.gif"
                 width='<?php echo(100*round($yes/($no+$yes+$maybe),2)); ?>'
                 height='20'>
            <?php echo(100*round($yes/($no+$yes+$maybe),2)); ?>%
        </td>
    </tr>
    <tr>
        <td>Liedje 2:</td>
        <td>
            <img src="poll.gif"
                 width='<?php echo(100*round($no/($no+$yes+$maybe),2)); ?>'
                 height='20'>
            <?php echo(100*round($no/($no+$yes+$maybe),2)); ?>%
        </td>
    </tr>
    <tr>
        <td>Liedje 3:</td>
        <td>
            <img src="poll.gif"
                 width='<?php echo(100*round($maybe/($no+$yes+$maybe),2)); ?>'
                 height='20'>
            <?php echo(100*round($maybe/($no+$yes+$maybe),2)); ?>%
        </td>
    </tr>
</table>