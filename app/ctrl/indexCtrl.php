<?php
namespace app\ctrl;

use app\model\test;
use core\lib\db;
use core\m;

class indexCtrl extends m
{

    public function indexAction (){


        set_time_limit(0);

        $a=array(1,3,5,6,7,9,2,4,10,14,12,13,15,17,18,19,10,11);

        for($i=0;$i<count($a);$i++){

            for ($j=$i;$j>0;$j--){



            }
        }



        $a='a,b,d,c,e,g,f,n,m,j,z,x,y,A,C,B';
        $a="你好吗好不好啊是不是啊!sadfsadf";
        $arr = $this->getArr(10000,10,1000);

        $ase=array('a'=>2,3,'e'=>5,'c'=>8,6);
        var_dump($ase);
        exit;


       // var_dump($arr);
        $count=count($arr);
        $i=0;
//       echo $this->xuan($arr,$count);
//        echo ">>>>>>";
//        echo $this->mao($arr,$count);
//       echo "=============";
//       echo $this->cha($arr,$count);
//        echo "=============";
//       // var_dump($arr);
//        echo $this->gui($arr,$count);

        echo $this->re($a);

        //var_dump($arr);
        //var_dump($this->getDir("/Applications/MAMP/htdocs/kuang"));
       // var_dump($this->getFileC("/Applications/MAMP/htdocs/xx_member_token.txt"));
       // echo $this->checkSort($arr);

    }

    public  function re($str){

       $len= mb_strlen($str);
        $arr=array();
        for($i=$len;$i>=0;$i--){

            $arr[]=mb_substr($str,$i,1,'UTF-8');

        }
        $s=implode('',$arr);
        return $s;

    }


    public function xuan($arr,$count){

        $time_start = $this->microtime_float();

        for($i=0;$i<$count;$i++){

            for($j=$i+1;$j<$count;$j++){
                if($arr[$j]<$arr[$i]) {
                    $n = $arr[$j];
                    $arr[$j] = $arr[$i];
                    $arr[$i] = $n;
                }
            }

        }

        $time_end =  $this->microtime_float();
        //var_dump($arr);
        return $time = $time_end - $time_start;

    }
    public function cha($arr,$count){

        $time_starts = $this->microtime_float();

        for($i=1;$i<$count;$i++){
            $e=$arr[$i];
            $j=0;
            for($j=$i;$j>0 && $arr[$j-1] > $e;$j--){

                    $arr[$j] = $arr[$j-1];
            }

            //var_dump($j);
            $arr[$j]=$e;


        }
        $time_ends =  $this->microtime_float();
        //var_dump($arr);
        return  $times = $time_ends-$time_starts;

    }
    public function mao($arr,$count){

        $time_starts = $this->microtime_float();
        $flag=1;
        for($i=0;$i<$count && $flag;$i++){

            //$e=$arr[$i];
            $flag=0;
            for($j=$count;$j>$i;$j--){
                if($arr[$j]<$arr[$j-1]){
                    $n=$arr[$j-1];
                    $arr[$j-1]= $arr[$j];
                    $arr[$j]=$n;
                    $flag=1;
                }
               // $arr[$j]=$arr[$j-1];
            }
           // $arr[$j]=$e;
           // print_r($arr);

        }

        $time_ends =  $this->microtime_float();
        // var_dump($arr);
        return  $times = $time_ends-$time_starts;

    }
    public function checkSort($arr){
        $c=count($arr);
        $i=0;
        for($i>0;$i<$c;$i++){

            if(isset($arr[$i]) && isset($arr[$i+1]) && ($arr[$i]>$arr[$i+1])){

                return $arr[$i];
            }else{

            }

        }
        return 'true';
    }
    public  function  gui(array &$arr,$count){
        $time_starts = $this->microtime_float();
        $this->__mergeSort($arr,0,$count-1);
        $time_ends =  $this->microtime_float();

        return  $times = $time_ends-$time_starts;
    }
    public function __mergeSort(array &$arr,$l,$r){

        if($l<$r){
            $mid=floor(($l+$r)/2);
            $this->__mergeSort($arr,$l,$mid);
            $this->__mergeSort($arr,$mid+1,$r);
            $this->__merge($arr,$l,$mid,$r);
        }


    }
    public function __merge(array &$arr,$l,$mid,$r){

        $aux=array();
        for($i=$l;$i<=$r;$i++){
            $aux[$i-$l]=$arr[$i];
        }
        $i=$l;
        $j=$mid+1;
        for($k=$l;$k<=$r;$k++){
            if($i>$mid){
                $arr[$k]=$aux[$j-$l];
                $j++;
            }elseif($j>$r){
                $arr[$k]=$aux[$i-$l];
            }elseif($aux[$i-$l]<$aux[$j-$l]){
                $arr[$k]=$aux[$i-$l];
                $i++;
            }else{
                $arr[$k]=$aux[$j-$l];
                $j++;
            }
        }
    }

    public function getArr($n,$l,$r){

        $arr=array();
        for($i=0;$i<$n;$i++){

            $arr[$i]=rand($l,$r);

        }

        return $arr;
    }

    public  function microtime_float()
    {

        $arra = explode(" ", microtime());

        return  (floatval($arra[0])+floatval($arra[1]));
    }


    public function getDir($dir){

        $array=array();
        $arrayDir=opendir($dir);

        if($arrayDir){
            while(($file=readdir($arrayDir))!==false){
                if($file!='.' && $file!='..'){
                    $path=$dir.DIRECTORY_SEPARATOR.$file;
                    if(is_dir($path)){

                        $array['dir'][$path]=$this->getDir($path);

                    }else{
                        $array['file'][]=$path;
                    }
                }
            }
            closedir($arrayDir);
        }


        return $array;
    }

    public  function getFileC($file){


        if(file_exists($file)){
            $fp=fopen($file,r);
            $str="";
            while(!feof($fp)){
                $str.=fgets($fp);
            }
            if($str){
                $str = str_replace("\r\n","<br />",$str);
            }
            fclose($fp);
            return $str;
        }



    }

}