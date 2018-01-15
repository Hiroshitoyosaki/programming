
<html>

<!見出し>
<h1>好きな映画はなんですか？</h1>

<!タイトル>
<head>
	<title>好きな映画はなんですか？</title>
</head>


<!phpに名前とコメント情報を送る>
<form action="mission_2-3.php" method="post" >

名前 <input type="text" name="name2-2" size="">

<br>
コメント<input type="text" name="comment2-2" size="">

<br>
パスワード<input type="text" name="password2-2">



<input type="submit" />
</form>


</html>


<?php

//投稿番号を割り当てる
//コメントが保存されているはずのテキストファイルの内容を配列に格納
$comment_array=file('mission_2-2.text');


//「投稿回数をカウントするファイル」が存在するかどうかで条件分岐

//1回目は、ファイルを作って、1を入れる
//2回目以降であれば、投稿番号を更新していく

/////////////////////////////////////////////////////////////////////////////////////////////////////
//ここからif(ファイルが存在するか？)
if(file_exists('count.text')){

//カウント用ファイルを用いて、「投稿された回数を更新していく」だけのファイルを作る

//カウント用ファイルを開く
$fp2=fopen('count.text','r');

//文字列として、一行目を読み込む
$num_text=fgets($fp2);

//ファイルを閉じる
fclose($fp2);

//文字列をint(整数型)に変換
$number=(int)$num_text;
//1増やす
$number+=1;


//配列用ファイルを殻にして開く
$fp2=fopen('count.text','w');
//数を書き込む
fwrite($fp2,$number);

//ファイルを閉じる
fclose($fp2);

/////////////////////////////////////////////////////////////////////////////////////////////////////
//ここまでif(ファイルが存在するか？)
}

//###################################################################################################
//ここからelse(ファイルが存在しないとき)
else{

//まずはfopenのｗモード（書き込みモード）でファイルを開く
$fp=fopen('count.text','w');


//fopenで開いたテキストファイルに「test」と書き込む

$number=1;

fwrite($fp,$number);

//fopenで開いたテキストファイルを閉じる
fclose($fp);

//###################################################################################################
///ここまでelse(ファイルが存在しないとき)
}



//カウント用ファイルの数字を投稿番号として宣言

$comment_number=(int)$number;

//htmlのフォームで入力された情報を取得する


$form_name_2_2=$_POST['name2-2'];
$form_comment_2_2=$_POST['comment2-2'];
$form_password_2_2=$_POST['password2-2'];
//echo $form_password_2_2;


//時間を取得する
$time=date("20y/m/d/H:i:s");

//<>を変数にしてしまう
$p="<>";




//入力フォームの情報を一つの変数にまとめる
//変数をまとめる以前に、//$form_name_2_2,$form_comment_2_2がそもそも取得できていないことが判明
$form_contents=$comment_number.$p.$form_name_2_2.$p.$form_comment_2_2.$p.$form_password_2_2.$p.$time;
//echo $form_contents;



//テキストファイルに$formcontentsを書き込む
//保存したいテキストファイルに名前をつける
$filename='mission_2-2.text';

//fopenのaモードで（追記モード）でファイルを開く
$fp=fopen($filename,'a+');


//fopenで開いたテキストファイルに、$formcontentsを書き込む
fwrite($fp,$form_contents);


//改行する。
fwrite($fp,"\n");


//fopenで開いたテキストファイルを閉じる
fclose($fp);





//以下ループ処理



//大まかな流れとしては、＜テキストファイルの一行一行(配列の要素)に対して、explodeをかけて細分化した配列の中身を表示＞という一連の流れをforで何回も繰り返す。
//テキストファイルの各行(既に配列の要素だが)が、さらに細分化されて、5つの要素からなる配列になる(投稿番号、名前、コメント、パスワード、投稿時間)


//ループ処理する回数は、テキストファイルの行数の回数。
for($i=0; $i<count($comment_array); ++$i){
	//$comment_arrayの配列の要素(=各行)をexplodeで<>ごとに分け、もう一段レイヤーを下げて配列として格納
	$post=explode("$p",$comment_array[$i]);
	//explodeでもう一段細分化された配列を、echoで表示
	echo "投稿番号: ".$post[0],"<br>";
	echo "名前: ".$post[1],"<br>";
	echo "コメント: ".$post[2],"<br>";
	//配列の要素3つ目（4つ目）は、パスワードなので表示しない。
	//echo $post[3],"<br>";
	echo "投稿時間: ".$post[4],"<br>","<br>";
}




?>
