
<html>

<!見出し>
<h1>好きな映画はなんですか？</h1>

<!タイトル>
<head>
	<title>好きな映画はなんですか？</title>
</head>


<!phpに編集対象番号を送る>

<form action="mission_2-5.php" method="post" >

編集対象番号 <input type="text" name="edit_number" size="">
<br>
パスワード<input type="text" name="password">
<br>

<input type="submit" />
</form>


</html>



<?php
//以下html情報の取得


//htmlの入力フォームを取得
$en=$_POST['edit_number'];
$password_inquiry=$_POST['password'];

//テキストファイルを配列に格納
$comment_array=file('mission_2-2.text');

//<>を変数にしてしまう
$p="<>";


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ここからif（//もし編集指定番号が空白でないならば）
if(!empty($en)){


//ここからRoup
//削除対象番号で指定された投稿の「本来のパスワード」を呼び出す。
//ループ処理する回数は、テキストファイルの行数の回数。
for($i=0; $i<count($comment_array); ++$i){
	
	//$comment_arrayの配列の要素(=各行)をexplodeで<>ごとに分け、もう一段レイヤーを下げて配列として格納
	$post=explode("$p",$comment_array[$i]);
	
	///////////////////////////////////////////////////
	//ここから、if（取り出した投稿番号が編集対象番号と一致した時）
	if($post[0]==$en){
	
	//その時のパスワードを呼び出して、変数として宣言
	$password_stored=$post[3];
	
	}
	///////////////////////////////////////////////////
	//ここまで、if（取り出した投稿番号が編集対象番号と一致した時）
	
	//################################################
	//ここからelse(取り出した投稿番号が編集対象番号と一致しなかった時)
	else{
	
	//何もしない。
	
	}
	//################################################
	//ここまで、else(取り出した投稿番号が編集対象番号と一致しなかった時)
	
	
}
//ここまでRoup

//////////////////////////////////////////////////////////////
//ここからif(パスワードが一致した時のみ、対象の編集内容を表示)
if($password_stored==$password_inquiry){


//ここからRoup1
//ループ処理する回数は、テキストファイルの行数の回数。
for($i=0; $i<count($comment_array); ++$i){
	
	//$comment_arrayの配列の要素(=各行)をexplodeで<>ごとに分け、もう一段レイヤーを下げて配列として格納
	$post=explode("$p",$comment_array[$i]);
	
	
	//echo $post[0];
	//その投稿番号の投稿内容をを書き込まない。
	
	////////////////////
	//ここからif(取り出した投稿番号が編集対象番号と一致した時)
	if($post[0]==$en){
	
	//投稿番号を変数として宣言
	$edit_num=$post[0];
	$user=$post[1];
	$text=$post[2];
	
	}
	////////////////////
	//ここまで、if(取り出した投稿番号が編集対象番号と一致した時)
	
	
	//##################
	//ここからelse（取り出した投稿番号が削除対象番号と一致しなかった時）
	else{
	
	//何もしない。
	
	}
	//##################
	//ここまでelse（取り出した投稿番号が削除対象番号と一致しなかった時）

//ここまでRoup1
}



}
//ここまでif(パスワードが一致した時のみ、対象の編集内容を表示)
//////////////////////////////////////////////////////////////


//############################################################
//ここからelse(パスワードが一致していない時)
else{

echo "パスワードが一致していません";

}
//############################################################
//ここまで、else(パスワードが一致していない時)



}
//ここまでif（//もし編集指定番号が空白でないならば）
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//###########################################################################################################################
//ここからelse1(編集番号が空白の時)
else{

//入力フォームが空白の時は何もしない。

//ここまでelse1
}
//###########################################################################################################################
?>



	<html>
	<form action=mission_2-5.php method=post>
	
	<input name="edit_num" type="hidden" value="<?php echo $edit_num ;?>"/><br>
	
	<input name="user" type="text" value="<?php echo $user ;?>"/><br>
	
	<input name="text" type"text" value="<?php echo $text ;?>"/><br>
	
	<button type="submit" name="sub1">送信</button>
	
	</form>
	</html>






<?php


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ここからif(編集の送信ボタンが押された時(これあってんのか？))
if(isset($_POST["sub1"])){


//text fileを配列として読み込んで、ループ処理
//→編集番号と投稿番号が一致した時のみ、すり替えればいい。


//テキストファイルを配列に格納
$comment_array2=file('mission_2-2.text');


//<>を変数にしてしまう
$p="<>";


//編集画面で受け取ったユーザー名とコメントの中身を変数として宣言

$recieved_edit_num=$_POST['edit_num'];
$recieved_user=$_POST['user'];
$recieved_text=$_POST['text'];
$time=date("20y/m/d/H:i:s");

$edit_contents=$recieved_edit_num.$p.$recieved_user.$p.$recieved_text.$p.$password_stored.$p.$time;



//fopenのwモードで（上書きモード）でmission_2-2.textファイルを開く
$fp=fopen('mission_2-2.text','w+');



//ここからRoup
//ループ処理する回数は、テキストファイルの行数の回数。
for($i=0; $i<count($comment_array2); ++$i){
	
	
	//$comment_arrayの配列の要素(=各行)をexplodeで<>ごとに分け、もう一段レイヤーを下げて配列として格納
	$post2=explode("$p",$comment_array2[$i]);	
	
	////////////////////////////////////////////////////////////
	//ここからif（取り出した投稿番号が編集対象番号と一致した時）
	if($post2[0]==$recieved_edit_num){
	
	fwrite($fp,$edit_contents."\n");
	
	}
	////////////////////////////////////////////////////////////
	//ここまで、if（取り出した投稿番号が編集対象番号と一致した時）
	
	//##########################################################
	//ここからelse（取り出した投稿番号が編集対象番号と一致しなかった時）
	else{
	
	//{その投稿番号の投稿を書き込む}
	
	//fopenで開いたテキストファイルに、投稿を再び書き込む
	fwrite($fp,$comment_array[$i]);
	
	}
	//##########################################################
	//ここまでelse（取り出した投稿番号が編集対象番号と一致しなかった時）
	
//ここまでRoup
}

//fopenで開いたテキストファイルを閉じる
fclose($fp);

echo "編集が完了しました";


}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ここまで、if(編集の送信ボタンが押された時(これあってんのか？))


//############################################################################################################################
//ここからelse(編集の送信ボタンが押されなかったら？)
{

//なにもしない。


}
//############################################################################################################################
//ここまで、lse(編集の送信ボタンが押されなかったら？)


?>






