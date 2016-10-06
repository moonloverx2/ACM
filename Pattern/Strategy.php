<?php
//抽象策略-会员
abstract class MemberStrategy{
	abstract function CalcuPrice($Price,$Number);
}

//具体策略
//初级会员
class PrimaryMemberStrategy extends MemberStrategy{
	function CalcuPrice($Price,$Number)
	{
		echo "PrimaryMember do not enjoy discount. So final consumption is ".$Price*$Number;
	}
}

//中级会员
class IntermediateMemberStrategy extends MemberStrategy{
	function CalcuPrice($Price,$Number)
	{
		echo "Primary Member enjoy 10% discount. So final consumption is ".$Price*$Number*0.9;
	}
}

//高级会员
class AdvancedMemberStrategy extends MemberStrategy{
	function CalcuPrice($Price,$Number)
	{
		echo "Advanced Member enjoy 20% discount. So final consumption is ".$Price*$Number*0.8;
	}
}

//价格类
class Price{
	private $Member;
	function __construct(MemberStrategy $Member)
	{
		$this->Member = $Member;
	}
	function CalcuPrice($Price,$Number)
	{
		$this->Member->CalcuPrice($Price, $Number);
	}
}

//调用
$PrimaryMember = new PrimaryMemberStrategy();
$IntermediateMember = new IntermediateMemberStrategy();
$AdvancedMember = new AdvancedMemberStrategy();

//传入不同的策略对象，得到不同的结果
$Price = new Price($PrimaryMember);
$Price->CalcuPrice(68,2);

$Price = new Price($IntermediateMember);
$Price->CalcuPrice(68,2);

$Price = new Price($AdvancedMember);
$Price->CalcuPrice(68,2);

?>