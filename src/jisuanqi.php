
<?php 
$num1=isset($_POST["num1"])?$_POST["num1"]:0;
$num2=isset($_POST["num2"])?$_POST["num2"]:0;
$fuhao=isset($_POST["fuhao"])?$_POST["fuhao"]:0;

switch ($fuhao) {
	case '%':
        if($num2 == 0){
            $num2 = 1;
        }
		$n=$num1%$num2;
		break;
	case '÷':
		$n=$num1/$num2;
		break;
	case '×':
		$n=$num1*$num2;
		break;
	case '-':
		$n=$num1-$num2;
		break;
	case '+':
		$n=$num1+$num2;
		break;
	default:
		$n=$num1+$num2;
		break;
}
    $ip=$num1.$fuhao.$num2;
if($num1==0 && $num2==0 && $fuhao==0){
    $n=0;
    $ip=0;
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<style type="text/css">
	*{
		padding: 0;
		margin: 0;
	}
	body{
		background: #F1F1F1;
	}
	#box{
    width: 390px;
    height: 600px;
    margin: 50px auto;
    position: relative;
		}
	.w_b{
    height: 600px;
    width: 360px;
    margin: 0 auto;
    background: white;
    box-shadow: 0px 0px 30px rgb(187, 187, 187);
    position: relative;
	}
	.b_b{
    position: absolute;
    height: 360px;
    width: 360px;
    top: 120px;
    left: 0;
    background: rgba(35, 40, 50, 0.91);
    box-shadow: 1px -1px 10px #5A5A5A;
    padding: 30px 15px 30px 15px;
	}	
	.l_in{
	position: relative;
    float: left;
    width: 360px;
    border: 0px;
    background: white;
    height: 40px;
    text-align: right;
    font-size: 22px;
    text-indent: 10px;
    direction: rtl;
    color: #B5B5B5;
    outline: none;
	}
	.b_in{
    position: relative;
    float: left;
    width: 360px;
    border: 0px;
    background: #FFFFFF;
    height: 70px;
    text-align: right;
    font-size: 50px;
    text-indent: 10px;
    direction: rtl;
    color: #7C8086;
    outline: none;
	}
	.submit{
    position: absolute;
    bottom: 0px;
    background: #EF543A;
    color: white;
    width: 360px;
    border: none;
    outline: none;
    height: 60px;
    font-size: 51px;
    cursor: pointer;
    left: 0px;
	}
	.submit:hover{
		background: #DE4C34;
	}

	.b_b ul li{
    list-style: none;
    float: left;
    width: 89px;
    height: 71px;
    margin-left: 1px;
    margin-top: 1px;
    text-align: center;
    line-height: 71px;
    color: white;
    font-size: 24px;
    cursor: pointer;
	}
	.b_b ul li:hover{
		background: #DE4C34;
	}

	</style>
	<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
	$(function(){
		// 清空
		$(".clear").click(function(){
			$(".b_in").val("");
			$(".num1").val("");
			$(".fuhao").val("");
			$(".num2").val("");
			document.getElementsByClassName("b_in")[0].setAttribute("placeholder","0");

		});
		// 第一个数字点击
		var ka=true;
		var c=true;
		$(".num").click(function(){
			if(ka){
				var n=$(this);
				var v=this.innerHTML;
				var b_v=$(".b_in").val();
				var nn=""+b_v+v+"";
				$(".b_in").val(nn);
				$(".num1").val(nn);
			}else{
				if(c){
					$(".b_in").val("");
					c=false;
				}
				var n=$(this);
				var v=this.innerHTML;
				var b_v=$(".b_in").val();
				var nn=""+b_v+v+"";
				$(".b_in").val(nn);
				$(".num2").val(nn);
			}

		});
		// 符号点击
			$(".fu").click(function(){

			var bb=document.getElementsByClassName("b_in")[0].getAttribute("placeholder");
			// if(bb!=0){
			// 	$(".b_in").val(parseInt(bb));
			// }
			var n=$(this);
			var v=this.innerHTML;
			$(".fuhao").val(v);
			ka=false;
		});


	})
	</script>
</head>
<body>
	<div id="box">
		<div class="w_b">
			<form action="jisuanqi.php" method="post">
			<input type="hidden" name="num1" class="num1" />
			<input type="hidden" name="fuhao" class="fuhao"  />
			<input class="num2" name="num2"  type="hidden" />
			<input class="l_in" placeholder="<?php echo $ip; ?>" type="text"  disabled="true" />
			<input class="b_in" value="" placeholder="<?php echo $n; ?>" type="text" />
			<input type="submit" class="submit" value="=" />
			</form>
		</div>
		<div class="b_b">
			<ul>
				<li class="clear">C</li>
				<li class="">±</li>
				<li class="fu">%</li>
				<li class="">√</li>
				<li class="num">7</li>
				<li class="num">8</li>
				<li class="num">9</li>
				<li class="fu">÷</li>
				<li class="num">4</li>
				<li class="num">5</li>
				<li class="num">6</li>
				<li class="fu">×</li>
				<li class="num">1</li>
				<li class="num">2</li>
				<li class="num">3</li>
				<li class="fu">-</li>
				<li class="num">0</li>
				<li class="num">00</li>
				<li class="num">.</li>
				<li class="fu">+</li>
			</ul>
		</div>
	</div>
</body>
</html>