<?php
/**
 * 数据验证工具类.
 *<B>说明：</B>
 *<pre>
 *  略
 *</pre>
 *<B>示例：</B>
 *<pre>
 *  略
 *</pre>
 *<B>日志：</B>
 *<pre>
 *  略
 *</pre>
 *<B>注意事项：</B>
 *<pre>
 *  略
 *</pre>
 * @author chinabluexfw email:chinabluexfw@163.com qq:330114809 创建于 2012-12-21
 * @version 1.0
 */

/**
 * 数据验证工具类.
 *<B>说明：</B>
 *<pre>
 *  略
 *</pre>
 *<B>示例：</B>
 *<pre>
 *
 *  示例1：普通调用
 *  $u_validate = Validate::model();
 *  //需要验证的数据
    $data  = array("name2"=>"0","name4"=>"admin173.com");
 *  //验证规则
    $rules = array(
        array('name'=>"name2","func"=>"min","params"=>1,"options"=>array('erroron'=>false)),
        array('name'=>"name4","func"=>"email","params"=>1)
    );
 *  //执行验证
    $rtn = $u_validate->check($data, $rules);
    if ($rtn === false) {
        echo $u_validate->getError();
    }
 *
 *  示例2：二维数组调用
 *  $u_validate = Validate::model();
    $data  = array(
        array("name2"=>"1","name4"=>"admin173.com"),
        array("name2"=>"中文sdfdsf","name4"=>"admin173.com")
    );

    $rules = array(
        array('name'=>"name2","func"=>"min","params"=>1,"options"=>array('erroron'=>false)),
        array('name'=>"name4","func"=>"email","params"=>1)
    );

    $rtn = $u_validate->check($data, $rules);

 *  示例3：自定义错误消息
 *  $data  = array("name2"=>"0","name4"=>"admin173.com");
 *  $u_validate = Validate::model();
 *   $rules = array(
        array('name'=>"name2","func"=>"min","params"=>1,'msg'=>'最小值',"options"=>array('erroron'=>false)),
        array('name'=>"name4","func"=>"email","params"=>1)
    );
 *
 *  $rtn = $u_validate->check($data, $rules);
 *
 *  示例4：调用其他验证方法
 *  $u_validate = new Validate();
    $data  = array(
        array("name2"=>"1","name4"=>"admin173.com"),
        array("name2"=>"中文sdfdsf","name4"=>"admin173.com")
    );

    $rules = array(
        array('name'=>"name2","func"=>array(array(new Core(),'check')),"params"=>array(2,3),"options"=>array('erroron'=>false)),
    );

    $rtn = $u_validate->check($data, $rules);
    if ($rtn === false) {
        echo $u_validate->getError();
    }
 *
 *  示例4：添加验证方法
    $u_validate = Validate::model();
    $data  = array(
        array("name2"=>"2","name4"=>"admin173.com"),
    );

    $rules = array(
        array('name'=>"name2","func"=>array('checkname'),"params"=>3),
    );
    //添加验证方法
    $rtn = $u_validate->add('checkname', array($this,'check'),'用户名不唯一');

    $rtn = $u_validate->check($data, $rules);
    if ($rtn === false) {
        echo $u_validate->getError();
    }
 *
 *  示例5：自定义验证方法参数,默认的params 参数失效
 *  $u_validate = Validate::model();
    $data  = array("name2"=>"2","name4"=>"ranglen",'tel'=>'13511111111');

    $rules = array(
        array('name'=>"name2","func"=>array('min',1),"params"=>3),
        array('name'=>"name4","func"=>array('ranglen',array(10,20)),"params"=>3),
        array('name'=>"tel","func"=>array($this,'check',array(10,20)),"params"=>3),
    );

    $rtn = $u_validate->check($data, $rules);
    if ($rtn === false) {
        echo $u_validate->getError();
    }
 *
 *
 *
 *
 *  验证规则参数介绍
 *  $rules =>array(
 *      'name'=>"name2",//验证key 名称，可以理解为数组key
 *      "func"=>"min",//验证函数 支持!，比如!min
 *      "params"=>1,//传入的验证参数，比如验证最小值min,传入最小值 7，可以传入任何值
 *      'msg'=>'错误消息',//自定义消息,数组，字符串
 *      "options"=>array(//配置信息其他配置
 *          'on'=>false //验证错误后是否继续验证，true 继续 false 终止
 *          'op'=>'&&' //操作符 && 与逻辑 或|| 逻辑
 *      )
 * ),
 *
 *</pre>
 *<B>日志：</B>
 *<pre>
 *  略
 *</pre>
 *<B>注意事项：</B>
 *<pre>
 *  略
 *</pre>
 * @author chinabluexfw 创建于 2012-12-21
 * @version 1.0
 * @package Util
 */
class ValidateUtil
{
    /**
     * 错误提示信息.
     *<B>说明：</B>
     *<pre>
     *  略
     *</pre>
     * @var array $error
     */
    private $errmsg = array();
    
    /**
     * 验证数据.
     *<B>说明：</B>
     *<pre>
     *  略
     *</pre>
     * @var array $data
     */
    private $data = array();
    
	/**
	 * 提示信息.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @var array $options
	 */
	private $message = array(
		'required'=>"必选字段",
        'email'=>"请输入正确格式的电子邮件",
        'url'=>"请输入合法的网址",
        'currency'=>"请输入合法的金额",
        'number'=>"请输入合法的数字",
        'post'=>"请输入6位数字邮编",
        'int'=>"请输入合法整数",
        'double'=>"请输入合法的浮点数",
        'date'=>"请输入合法的日期",
        'weight'=>"请输入保留三位小数的合法重量",
        'eng'=>"请输入英文字母",
        'zh'=>"请输入中文",
        'card'=>"请输入15或18位身份证号码",
        'phone'=>"请输入带区号的固定电话号码",
        'mobile'=>"请输入11位手机号码",
        'ip'=>"请输入合法的IP地址",
        'minlen'=>"请输入一个长度最少是 {0} 的字符串",
        'maxlen'=>"请输入一个长度最多是 {0} 的字符串",
        'rangelen'=>"请输入一个长度介于 {0} 和 {1} 之间的字符串",
        'min'=>"请输入一个最大为 {0} 的值",
        'max'=>"请输入一个最小为 {0} 的值",
        'range'=>"请输入一个介于 {0} 和 {1} 之间的值",
        'pattern'=>"请输入合法格式字符",
        'in'=>"请输入范围内的字符",
        'equal'=>"您输入的值必须等于{0}",
        'confirm'=>"您输入的{0},{1}值必须相同"   
	);
	
	/**
	 * 自定义方法.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @var array $options
	 */
	private $func = array();
	
	/**
     * 验证配置.
     *<B>说明：</B>
     *<pre>
     *  略
     *</pre>
     * @var array $options
     */
	private $options = array(
	      'on'=>true, //验证错误后，是否继续验证,
          'op'=>'&&' //操作符 && 与逻辑 或|| 逻辑
	);

    /**
     * 静态方法实例化对象
     * @return 当前对象
     */
    static public function model()
    {
        $args = func_get_args();
        $className = __CLASS__;
        $class = new $className();
        call_user_func_array(array($class,'init'),$args);
        return $class;
    }

    /**
     * 初始化操作
     */
    public function init($options = array())
    {
        $this->options = array_merge($this->options,$options);
    }
	
	/**
	 * 验证多个元素.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param array $data 验证数据 一维或二维数组
	 * @param array $rules 验证规则 
	 * $rules = array(
	 *     'name'=>"key",//数组key
	 *     'func'=>"email",//验证函数
	 *     'params'=>1,//参数，可以是数组，字符，数字等等
     *     'msg'=>'',//自定义错误消息,数组，字符串
	 *     'options'=>array(),//配置参数
	 * );
	 * @param array $options 配置参数
	 * @return bool 验证通过返回true,否则false
	 */
	public function check($data,$rules,$options = array())
	{
		$rtn = true;
		$level = $this->countArrayLevel($data);
		if ($level == 1) {
		    $data = array($data);
		}
		
	    $options = array_merge($this->options,$options);
	    foreach ($data as $_data) {
	        $rtn = $this->valid($_data,$rules,$options);
	    }
	    
	    return $rtn;
	}
	
	/**
	 * 验证一维数组.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param array $data 验证数据 一维数组
	 * @param array $rules 验证规则
	 * $rules = array(
	 *     'name'=>"key",//数组key
	 *     'func'=>"email",//验证函数
	 *     'params'=>1,//参数，可以是数组，字符，数字等等,
	 *     'options'=>array(),//配置参数
	 * );
	 * @param array $options 配置参数
	 * @return bool 验证通过返回true,否则false
	 */
	public function valid($data,$rules,$options = array())
	{
	    $rtn = true;
	    $this->data = $data;
	    foreach ($rules as $name=>$rule) {
	        $_rtn = $this->rule($data[$rule['name']],$rule);
	        $_options = $options;
	        if (!empty($rule['options']))  {
	            $_options = array_merge($_options,$rule['options']);
	        }
	
	        if ($_rtn == false) {
	            $rtn = false;
	            if ($_options['on'] === false) {//中断验证
	                break;
	            }
	        }
	    }
	     
	    return $rtn;
	}
	
	/**
	 * 添加自定义验证方法.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param array $name 方法名
	 * @param array|function $func 验证函数,可以采用闭包函数处理
	 * @param string $msg 提示消息
	 * @return void
	 */
	public function add($name,$func,$msg)
	{
	    $this->message[$name] = $msg;
	    $this->func[$name] = $func;
	}
	
	/**
	 * 验证单个元素.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $rule 验证规则
	 * @return bool true or false
	 */
	public function rule($value,$rules) 
	{

        $rtn = true;//验证结果
	    
        if (is_string($rules['func'])) {
            $_rules = explode(',', $rules['func']);
        } else {//二维数组形式
            $_rules = $rules['func'];
        }

        $op = !empty($rules['options']['op']) ? $rules['options']['op'] : '&&';

	    foreach ($_rules as $rule) {
            $_rule = $rule;

            $params = $rules['params'];

            if (is_array($rule)) {
                if (is_string($rule[0])) {
                    $_rule = $rule[0];
                    if (isset($rule[1])) {
                        $params = $rule[1];
                    }
                }
            }


            $false = false;//！非标示 true标示存在!标示
            //!非查找
            if (is_string($_rule) && '!' == substr($_rule,0,1)) {
                $_rule = substr($_rule,1);
                $false = true;
            }

            if (is_array($_rule)) {//自定义类定义

                $func_params = array($value);
                $fu_params = count($_rule) == 3 ?  $_rule[2] : $params;
                if (is_array($fu_params)) {
                    $func_params = array_merge($func_params,$fu_params);
                } else {
                    $func_params[] = $fu_params;
                }

                $_rtn = call_user_func_array(array($_rule[0],$_rule[1]),$func_params);

            } else {

                $func_params = array();
                $func_params = array($value,$params,$rules);
                if (isset($this->func[$_rule])) {
                    //@todo 支持闭包函数
                    $_rtn = call_user_func_array($this->func[$_rule],$func_params);
                } else {
                    $_rtn = call_user_func_array(array(&$this,$_rule),$func_params);
                }
            }

            if (is_bool($_rtn)) {
                $bool = $_rtn;
            } else if (is_array($_rtn)) {
                $bool = $_rtn['bool'];
            }

            if ($false === true) {
                $bool = !$bool;
            }

            if ($bool === false) {
                $rtn = false;
                $msg = $this->formatMsg($rule,$rules,$_rtn);
                $this->error($rules['name'],$msg);
            } else {
                if ($op == '||') {
                    $rtn = true;
                    $this->error($rules['name'],null);
                    break;
                }
            }

	    }

	    return $rtn;
	    
	}
	
	/**
	 * 获取消息.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $func 函数名
     * @param array $rules 验证规则
     * @param array $rtn 验证结果
	 * @return string
	 */
	public function formatMsg($func,$rules,$rtn)
	{
	    if (!empty($rules['msg'])) {
            $msg = $rules['msg'];
        } else {
            $msg = !empty($rtn['msg']) ? $rtn['msg'] : $this->message[$func];
        }

	    $params = array();
	    if(is_array($rules['params'])) {
            $params = $rules['params'];
	    } else {
            $params[] = $rules['params'];
	    }
	    
	    if (!empty($rtn['params'])) {
            $params = $rtn['params'];
	    }
	    
	    $search = array_keys($params);
	    foreach ($search as $key=>$val) {
	        $search[$key] = "{".$val."}";
	    }
	    
	    $replace = array_values($params);
	    $msg = str_replace($search, $replace, $msg);

	    return $msg;
	}
	
	/**
	 * 设置错误提示信息.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $name 消息key
	 * @param string $msg 错误消息
	 * @return bool true
	 */
	public function error($name = '',$msg = '')
	{

        if (is_null($msg)) {
            unset($this->errmsg[$name]);
        } else {
            $this->errmsg[$name] = $msg;
        }

        return true;
	}

    /**
     * 获取错误提示信息.
     *<B>说明：</B>
     *<pre>
     *  略
     *</pre>
     *<B>示例：</B>
     *<pre>
     *  略
     *</pre>
     *<B>日志：</B>
     *<pre>
     *  略
     *</pre>
     *<B>注意事项：</B>
     *<pre>
     *  略
     *</pre>
     * @author xuefw 创建于 2012-12-24
     * @param string $name
     * @return string|array
     */
    public function getError($name = '')
    {

        if (!empty($name)) {
            return $this->errmsg[$name];
        } else {
            return implode(",", $this->errmsg);
        }

        return true;
    }
	
	/**
	 * 获取固定格式的验证结果数组.
	 *<B>说明：</B>
	 *<pre>
	 *  当前
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @return array
	 */
	public function formatRtn()
	{
	    $rtn = array(
	            "bool"=>true,//是否验证通过
	            "params"=>array(),//参数，可以用于提示消息的替换参数
	            "msg"=>"",//提示消息
	    );

	    return $rtn;
	}
	
	/**
	 * 必填验证.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function required($value,$params)
	{
		$_reg =  '/.+/';
		return preg_match($_reg,$value) === 1;

	}

    /**
     * 验证PHP empty 函数
     *<B>说明：</B>
     *<pre>
     *  略
     *</pre>
     *<B>示例：</B>
     *<pre>
     *  略
     *</pre>
     *<B>日志：</B>
     *<pre>
     *  略
     *</pre>
     *<B>注意事项：</B>
     *<pre>
     *  略
     *</pre>
     * @author xuefw 创建于 2012-12-24
     * @param string $value 验证值
     * @param array $params 参数
     * @return bool true or false
     */
    public function ety($value,$params)
    {
        return empty($value) === true;
    }

    /**
     * 验证PHP isset 函数
     *<B>说明：</B>
     *<pre>
     *  略
     *</pre>
     *<B>示例：</B>
     *<pre>
     *  略
     *</pre>
     *<B>日志：</B>
     *<pre>
     *  略
     *</pre>
     *<B>注意事项：</B>
     *<pre>
     *  略
     *</pre>
     * @author xuefw 创建于 2012-12-24
     * @param string $value 验证值
     * @param array $params 参数
     * @return bool true or false
     */
    public function set($value,$params)
    {
        return isset($value) === true;
    }
	
	/**
	 * 验证邮箱.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function email($value,$params)
	{
	    $_reg =  '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证url.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function url($value,$params)
	{
	    $_reg =  '/^http(s?):\/\/(?:[A-za-z0-9-]+\.)+[A-za-z]{2,4}(?:[\/\?#][\/=\?%\-&~`@[\]\':+!\.#\w]*)?$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证货币.
	 *<B>说明：</B>
	 *<pre>
	 *  浮点数，保留两位小数
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function currency($value,$params)
	{
	    $_reg = '/^[-\+]?(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证数字.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function number($value,$params)
	{
	    $_reg = '/^\d{$}+{$}$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证邮编.
	 *<B>说明：</B>
	 *<pre>
	 *  6 位数字邮编
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function post($value,$params)
	{
	    $_reg = '/^[0-9]{6}$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证整数.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function int($value,$params)
	{
	    $_reg = '/^[-\+]?\d+$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证浮点数.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function double($value,$params)
	{
	    $_reg = '/^[-\+]?\d+(\.\d+)?$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证日期.
	 *<B>说明：</B>
	 *<pre>
	 *  2012-12-05
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function date($value,$params)
	{
	    $_reg = '/^[-\+]?\d+(\.\d+)?$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证重量.
	 *<B>说明：</B>
	 *<pre>
	 *  保留三位小数 格式：20.001
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function weight($value,$params)
	{
	    $_reg = '/^[-\+]?(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,3})?$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证英文字母.
	 *<B>说明：</B>
	 *<pre>
	 *  不区分大小写
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function eng($value,$params)
	{
	    $_reg = '/^[A-Za-z]+$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证中文.
	 *<B>说明：</B>
	 *<pre>
	 *  不区分大小写
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function zh($value,$params)
	{
	    $_reg = '/^[\u4E00-\u9FA5\uf900-\ufa2d]+$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证身份证.
	 *<B>说明：</B>
	 *<pre>
	 *  支持15、18位数身份证验证
	 *  不支持身份证的真实性验证
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function card($value,$params)
	{
	    $_reg = '/^(\d{15}|\d{18})$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证固定电话.
	 *<B>说明：</B>
	 *<pre>
	 *  格式:021-11212121,0898-12121212
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function phone($value,$params)
	{
	    $_reg = '/^(\d{3}-\d{8}|\d{4}-\d{7})$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证13位移动电话.
	 *<B>说明：</B>
	 *<pre>
	 *  支持13,14,15,18  等前缀的手机号码
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function mobile($value,$params)
	{
	    $_reg = '/^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证IP 地址.
	 *<B>说明：</B>
	 *<pre>
	 *  格式：192.168.152.12
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function ip($value,$params)
	{
	    $_reg = '/^(\d+\.\d+\.\d+\.\d+)$/';
	    return preg_match($_reg,$value) === 1;
	}
	
	/**
	 * 验证字符最小长度.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function minlen($value,$params)
	{
	    return $this->len($value) >= $params;
	}
	
	/**
	 * 验证字符最大长度.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function maxlen($value,$params)
	{
	    return $this->len($value) <= $params;
	}
	
	/**
	 * 验证字符长度范围.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function rangelen($value,$params)
	{
	    $_len = $this->len($value);
	    return  ($_len >= $params[0] && $_len <= $params[1]);
	}
	
	/**
	 * 验证最小值.
	 *<B>说明：</B>
	 *<pre>
	 *  支持浮点数
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function min($value,$params)
	{

	    if (!is_numeric($value) || !is_numeric($params)) {
	        return false;
	    }

	    return  $value >= $params;
	}
	
	
	/**
	 * 验证最大值.
	 *<B>说明：</B>
	 *<pre>
	 *  支持浮点数
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function max($value,$params)
	{
	    if (!is_numeric($value) || !is_numeric($params)) {
	        return false;
	    }
	     
	    return  $value <= $params;
	}
	
	/**
	 * 验证数值范围.
	 *<B>说明：</B>
	 *<pre>
	 *  支持浮点数
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function range($value,$params)
	{
	    if (!is_numeric($value) || !is_numeric($params[0]) || !is_numeric($params[1])) {
	        return false;
	    }
	    
	    return  ($value >= $params[0] && $value <= $params[1]);
	}
	
	/**
	 * 验证正则表达式.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function pattern($value,$params)
	{
	    return preg_match($value,$params) === 1;
	}
	
	/**
	 * 验证值是否存在数值中.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  $str = "1,2,3,4";
	 *  $str = array('1','2',3);
	 *  $str = array('1'=>'22','2'=>"44",3=>"22");
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array|string $params 参数
     * string:'1,2,3,4';
     * array:array(1,2,3,5);
	 * @return bool true or false
	 */
	public function in($value,$params)
	{
	    if (is_string($params)) {
	        $params = explode(',', $params);
	    }

	    return in_array($value, $params);
	}
	
	/**
	 * 验证值是否相等.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return void
	 */
	public function equal($value,$params)
	{
	    return $value == $params;
	}
	
	/**
	 * 验证两字段值是否相等.
	 *<B>说明：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return bool true or false
	 */
	public function confirm($value,$params)
	{
	    return $value == $params;
	}
	
	
	
	/**
	 * 统计字符长度.
	 *<B>说明：</B>
	 *<pre>
	 *  支持中文，英文的等等
	 *  支持各种编码
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>日志：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  略
	 *</pre>
	 * @author xuefw 创建于 2012-12-24
	 * @param string $value 验证值
	 * @param array $params 参数
	 * @return int
	 */
	private function len($value,$charset="utf-8") 
	{
	    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	    preg_match_all($re[$charset], $value, $match);
	    return count($match[0]);
	}
	
	/**
	 * 计算数组维数
	 *<B>说明：</B>
	 *<pre>
	 *  采用递归方式实现
	 *</pre>
	 *<B>示例：</B>
	 *<pre>
	 *  略
	 *</pre>
	 *<B>注意事项：</B>
	 *<pre>
	 *  如果数组为空，则返回0
	 *</pre>
	 * @author xuefw 创建于 2012-11-23
	 * @param array $arr 源数组
	 * @return int
	 */
	private  function countArrayLevel($arr)
	{
	    if (!is_array($arr)) {
	        return 0;
	    }
	
	    $level = 0;
	    foreach($arr as $r) {
	        $subLevel = $this->countArrayLevel($r);
	        if( $subLevel > $level) {
	            $level = $subLevel;
	            break;
	        }
	    }
	
	    return $level + 1;
	}

	
}
?>