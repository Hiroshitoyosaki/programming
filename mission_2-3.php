
<html>

<!���o��>
<h1>�D���ȉf��͂Ȃ�ł����H</h1>

<!�^�C�g��>
<head>
	<title>�D���ȉf��͂Ȃ�ł����H</title>
</head>


<!php�ɖ��O�ƃR�����g���𑗂�>
<form action="mission_2-3.php" method="post" >

���O <input type="text" name="name2-2" size="">

<br>
�R�����g<input type="text" name="comment2-2" size="">

<br>
�p�X���[�h<input type="text" name="password2-2">



<input type="submit" />
</form>


</html>


<?php

//���e�ԍ������蓖�Ă�
//�R�����g���ۑ�����Ă���͂��̃e�L�X�g�t�@�C���̓��e��z��Ɋi�[
$comment_array=file('mission_2-2.text');


//�u���e�񐔂��J�E���g����t�@�C���v�����݂��邩�ǂ����ŏ�������

//1��ڂ́A�t�@�C��������āA1������
//2��ڈȍ~�ł���΁A���e�ԍ����X�V���Ă���

/////////////////////////////////////////////////////////////////////////////////////////////////////
//��������if(�t�@�C�������݂��邩�H)
if(file_exists('count.text')){

//�J�E���g�p�t�@�C����p���āA�u���e���ꂽ�񐔂��X�V���Ă����v�����̃t�@�C�������

//�J�E���g�p�t�@�C�����J��
$fp2=fopen('count.text','r');

//������Ƃ��āA��s�ڂ�ǂݍ���
$num_text=fgets($fp2);

//�t�@�C�������
fclose($fp2);

//�������int(�����^)�ɕϊ�
$number=(int)$num_text;
//1���₷
$number+=1;


//�z��p�t�@�C�����k�ɂ��ĊJ��
$fp2=fopen('count.text','w');
//������������
fwrite($fp2,$number);

//�t�@�C�������
fclose($fp2);

/////////////////////////////////////////////////////////////////////////////////////////////////////
//�����܂�if(�t�@�C�������݂��邩�H)
}

//###################################################################################################
//��������else(�t�@�C�������݂��Ȃ��Ƃ�)
else{

//�܂���fopen�̂����[�h�i�������݃��[�h�j�Ńt�@�C�����J��
$fp=fopen('count.text','w');


//fopen�ŊJ�����e�L�X�g�t�@�C���Ɂutest�v�Ə�������

$number=1;

fwrite($fp,$number);

//fopen�ŊJ�����e�L�X�g�t�@�C�������
fclose($fp);

//###################################################################################################
///�����܂�else(�t�@�C�������݂��Ȃ��Ƃ�)
}



//�J�E���g�p�t�@�C���̐����𓊍e�ԍ��Ƃ��Đ錾

$comment_number=(int)$number;

//html�̃t�H�[���œ��͂��ꂽ�����擾����


$form_name_2_2=$_POST['name2-2'];
$form_comment_2_2=$_POST['comment2-2'];
$form_password_2_2=$_POST['password2-2'];
//echo $form_password_2_2;


//���Ԃ��擾����
$time=date("20y/m/d/H:i:s");

//<>��ϐ��ɂ��Ă��܂�
$p="<>";




//���̓t�H�[���̏�����̕ϐ��ɂ܂Ƃ߂�
//�ϐ����܂Ƃ߂�ȑO�ɁA//$form_name_2_2,$form_comment_2_2�����������擾�ł��Ă��Ȃ����Ƃ�����
$form_contents=$comment_number.$p.$form_name_2_2.$p.$form_comment_2_2.$p.$form_password_2_2.$p.$time;
//echo $form_contents;



//�e�L�X�g�t�@�C����$formcontents����������
//�ۑ��������e�L�X�g�t�@�C���ɖ��O������
$filename='mission_2-2.text';

//fopen��a���[�h�Łi�ǋL���[�h�j�Ńt�@�C�����J��
$fp=fopen($filename,'a+');


//fopen�ŊJ�����e�L�X�g�t�@�C���ɁA$formcontents����������
fwrite($fp,$form_contents);


//���s����B
fwrite($fp,"\n");


//fopen�ŊJ�����e�L�X�g�t�@�C�������
fclose($fp);





//�ȉ����[�v����



//��܂��ȗ���Ƃ��ẮA���e�L�X�g�t�@�C���̈�s��s(�z��̗v�f)�ɑ΂��āAexplode�������čו��������z��̒��g��\�����Ƃ�����A�̗����for�ŉ�����J��Ԃ��B
//�e�L�X�g�t�@�C���̊e�s(���ɔz��̗v�f����)���A����ɍו�������āA4�̗v�f����Ȃ�z��ɂȂ�(���e�ԍ��A���O�A�R�����g�A����)


//���[�v��������񐔂́A�e�L�X�g�t�@�C���̍s���̉񐔁B
for($i=0; $i<count($comment_array); ++$i){
	//$comment_array�̔z��̗v�f(=�e�s)��explode��<>���Ƃɕ����A������i���C���[�������Ĕz��Ƃ��Ċi�[
	$post=explode("$p",$comment_array[$i]);
	//explode�ł�����i�ו������ꂽ�z����Aecho�ŕ\��
	echo "���e�ԍ�: ".$post[0],"<br>";
	echo "���O: ".$post[1],"<br>";
	echo "�R�����g: ".$post[2],"<br>";
	//�z��̗v�f3�ځi4�ځj�́A�p�X���[�h�Ȃ̂ŕ\�����Ȃ��B
	//echo $post[3],"<br>";
	echo "���e����: ".$post[4],"<br>","<br>";
}




?>