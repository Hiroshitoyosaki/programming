
<html>

<!見出し>
<h1>好きな映画はなんですか？</h1>

<!タイトル>
<head>
	<title>好きな映画はなんですか？</title>
</head>


<!phpに削除対象番号を送る>

<form action="mission_2-4.php" method="post" >

削除対象番号 <input type="text" name="delete_number" size="">
<br>
パスワード<input type="text" name="password">


<br>

<input type="submit" />
</form>


</html>


<?php





//以下html情報の取得

//htmlの入力フォームを取得
$dn=$_POST['delete_number'];
$password_inquiry=$_POST['password'];




//テキストファイルを配列に格納
$comment_array=file('mission_2-2.text');

//<>を変数にしてしまう
$p="<>";

////////////////////////////////////////////////////////////////////////////////////////////////////////
//ここからif(投稿番号が送信されなかった時)
if(empty($dn)){

//もし空白ならなにもしない。

}
////////////////////////////////////////////////////////////////////////////////////////////////////////
//ここまでif(投稿番号が送信されなかった時)

//######################################################################################################
//ここからelse(空白でなかった時)
else{


//パスワードを入力させるフォームに一致した時のみ、処理する



//ここからRoup
//削除対象番号で指定された投稿の「本来のパスワード」を呼び出す。
//ループ処理する回数は、テキストファイルの行数の回数。
for($i=0; $i<count($comment_array); ++$i){
	
	//$comment_arrayの配列の要素(=各行)をexplodeで<>ごとに分け、もう一段レイヤーを下げて配列として格納
	$post=explode("$p",$comment_array[$i]);
	
	///////////////////////////////////////////////////////////////
	//ここからif(取り出した投稿番号が削除対象番号と一致した時)
	if($post[0]==$dn){
	
	
	//その時のパスワードを呼び出して、変数として宣言
	$password_stored=$post[3];
	
	
	}
	///////////////////////////////////////////////////////////////
	//ここまでif(取り出した投稿番号が削除対象番号と一致した時)
	
	//#############################################################
	//ここからelse(取り出した投稿番号が削除対象番号と一致しなかった時)
	else{
	
	//何もしない。
	
	}
	//#############################################################
	//ここまで、else(取り出した投稿番号が削除対象番号と一致しなかった時)
	
//ここまでRoup
}






//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//ここからif(パスワードが一致した時のみ、削除を実行)
if($password_stored==$password_inquiry){


//fopenのwモードで（上書きモード）でmission_2-2.textファイルを開く
$fp=fopen('mission_2-2.text','w+');


//ここからRoup
//ループ処理する回数は、テキストファイルの行数の回数。
for($i=0; $i<count($comment_array); ++$i){
	
	//$comment_arrayの配列の要素(=各行)をexplodeで<>ごとに分け、もう一段レイヤーを下げて配列として格納
	$post=explode("$p",$comment_array[$i]);
	
	////////////////////////////////////////////////////////////////
	//ここから、if(取り出した投稿番号が削除対象番号と一致した時)
	if($post[0]==$dn){
		
	//その投稿番号の投稿内容をを書き込まない。
	
	}
	////////////////////////////////////////////////////////////////
	//ここまで、if(取り出した投稿番号が削除対象番号と一致した時)
	
	//##############################################################
	//ここからelse(取り出した投稿番号が削除対象番号と一致しなかった時)
	else{
	
	//{その投稿番号の投稿を書き込む}
	
	//fopenで開いたテキストファイルに、投稿を再び書き込む
	fwrite($fp,$comment_array[$i]);
	
	}
	//##############################################################
	//ここまで、else(取り出した投稿番号が削除対象番号と一致しなかった時)
	
//ここまでRoup
}


//fopenで開いたテキストファイルを閉じる
fclose($fp);

//削除が完了
echo "削除が完了しました";


}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//ここまで、if(パスワードが一致した時のみ、削除を実行)

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
//ここからelse(パスワードが一致していない時)
else{

echo "パスワードが一致していません";

}
//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
//ここまで、else(パスワードが一致していない時)



//######################################################################################################
//ここまでelse(空白でなかった時)
}
?>