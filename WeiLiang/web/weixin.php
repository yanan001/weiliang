<?php
header('content-type:text');
/**
  * wechat php test
  */

//define your token
define("TOKEN", "weixin110");
define("APPID", " wx3b602e0a423d3723 ");
define("APPSECRET", "d324a1529a7f0cd77f9b72fa3b309d38");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

      
        if($this->checkSignature()){
            echo $echoStr;
            $this->createMenu();
            $this->responseMsg();
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
            	//获取发送的文本内容
                $keyword = trim($postObj->Content);
            
            if($postObj->Event=="CLICK"){
                 $Accesstoken=$this->getAccesstoken();
                    $url="https://api.weixin.qq.com/cgi-bin/media/upload?access_token=".$Accesstoken."&type=image";
                    $data=array(
            		"file"=>"@123.jpg"
                	);
                  $json=$this->curlPost($url,$data,"POST");
                   $arr=json_decode($json,true);
                 $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Image>
                            <MediaId><![CDATA[%s]]></MediaId>
                            </Image>
                            </xml>";
              
                    $msgType = "image";
                	$contentStr = $arr['media_id'];
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr; 
            
            }else{
            
            	//获取手机用户发送的信息类型
            	$msgtype = $postObj->MsgType;
            
                $time = time();
                
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
            	//定义发送数据格式为音乐
            	$musicTpl="<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Music>
							<Title><![CDATA[%s]]></Title>
							<Description><![CDATA[%s]]></Description>
							<MusicUrl><![CDATA[%s]]></MusicUrl>
							<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
							
							</Music>
							</xml>";
            }
            	//判断文件类型
            	if($msgtype=='text'){
					//定义回复类型
						if($keyword=='音乐'){
							$msgType = "music";
							$title="帝都";
							$discripition="原声大碟非常动听";
							$music_url="C:\Users\亚男\Music";
							$hight_qing="C:\Users\亚男\Music";
							$resultStr = sprintf($musicTpl, $fromUsername, $toUsername, $time, $msgType, $title, $discripition, $music_url, $hight_qing);
							echo $resultStr;
						}
				  
					
					 if($keyword=='你好')
							 {
								 $msgType = "text";
								 $contentStr = "你也好!";
								 $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
								 echo $resultStr;
							 }
                        if(!empty($keyword))
                        {	
                              //图灵机器人接入
                             $url="http://www.tuling123.com/openapi/api?key=1aab513074ec5cb9b51be714b2141672&info=".$keyword;
                            $json=file_get_contents($url);
                            $arr=json_decode($json,true);
                            
                            $msgType = "text";
                            $contentStr = $arr['text'];
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;
                                
                        }else{
                            echo "Input something...";
                        }
                        
                }

            //判断文件类型
				if($msgtype=='image')
                {
              		$msgType = "text";
                	$contentStr = "好美哦!";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }
             
            
            if($msgtype=='voice')
                {
              		$msgType = "text";
                	$contentStr = "你的声音好甜";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }
            
            
             if($msgtype=='location')
                {
              		$msgType = "text";
                	$contentStr = "你的位置已被锁定";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }
            
             
           
            if($msgtype!='image' && $msgtype!='voice' && $msgtype!='location')
                {
              		$msgType = "text";
                	$contentStr = "欢迎关注，感谢关注！";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "感谢关注!";
                }


        }else {
        	echo "";
        	exit;
        }
    }
    
    /*public function getAccessstoken(){
    	
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
        $json=file_get_contents($url);
    	$arr=json_decode($json,true);
        $Accessstoken=$arr['access_token'];
        return	$Accessstoken;
    
    }*/
    private function getAccesstoken(){
         //return "aaa";
         $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
         $file=file_get_contents($url);
         $arr=json_decode($file,true);
         $Accesstoken=$arr['access_token'];
         return $Accesstoken;
    }
    
   /* public function createMenu(){
    	
        $Accessstoken=$this->getAccessstoken();
    	$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$Accessstoken;
        $data=' {
                 "button":[
                 {
                      "type":"click",
                      "name":"今日歌曲",
                      "key":"V1001_TODAY_MUSIC"
                  },
                  {
                       "name":"菜单",
                       "sub_button":[
                       {
                           "type":"view",
                           "name":"搜索",
                           "url":"http://www.soso.com/"
                        },
                        {
                           "type":"view",
                           "name":"视频",
                           "url":"http://v.qq.com/"
                        },
                        {
                           "type":"click",
                           "name":"赞一下我们",
                           "key":"V1001_GOOD"
			';
    
    		$json=$this->curlPost($url,$data,'POST');
        	return $json;
    }
      function curlPost($url,$data,$method){  
                $ch = curl_init();   //1.初始化  
                curl_setopt($ch, CURLOPT_URL, $url); //2.请求地址  
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);//3.请求方式  
                //4.参数如下  
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);//https  
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');//模拟浏览器  
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
                curl_setopt($ch, CURLOPT_AUTOREFERER, 1);  
                curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));//gzip解压内容  
                curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');  
                  
                if($method=="POST"){//5.post方式的时候添加数据  
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
                }  
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
                $tmpInfo = curl_exec($ch);//6.执行  
              
                if (curl_errno($ch)) {//7.如果出错  
                    return curl_error($ch);  
                }  
                curl_close($ch);//8.关闭  
                return $tmpInfo;  
        }*/
    
   public function createMenu(){
    	$Accesstoken=$this->getAccesstoken();
        $url=" https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$Accesstoken;
        
        $data='{
                 "button":[
                 {	
                      "type":"click",
                      "name":"今日歌曲",
                      "key":"V1001_TODAY_MUSIC"
                  },
                  {
                       "name":"菜单",
                       "sub_button":[
                       {	
                           "type":"view",
                           "name":"搜索",
                           "url":"http://www.soso.com/"
                        },
                        {
                           "type":"view",
                           "name":"视频",
                           "url":"http://v.qq.com/"
                        },
                        {
                           "type":"click",
                           "name":"赞一下我们",
                           "key":"V1001_GOOD"
                        }]
                   }]
             }';
        $html=$this->curlPost($url,$data,'POST');
        return $html;
       
    }
    
public function curlPost($url,$data,$method){  
        $ch = curl_init();   //1.初始化  
        curl_setopt($ch, CURLOPT_URL, $url); //2.请求地址  
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);//3.请求方式  
        //4.参数如下  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);//https  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');//模拟浏览器  
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);  
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));//gzip解压内容  
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');  
        
        if($method=="POST"){//5.post方式的时候添加数据  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
        }  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        $tmpInfo = curl_exec($ch);//6.执行  
        
        if (curl_errno($ch)) {//7.如果出错  
            return curl_error($ch);  
        }  
        curl_close($ch);//8.关闭  
        return $tmpInfo;  
    }  
    
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
        //return true;
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>
