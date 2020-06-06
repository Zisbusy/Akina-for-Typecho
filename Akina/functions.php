<?php
function themeConfig($form) {
echo '<style>
.typecho-page-title h2 {
    font-weight: 600;
    color: #737373;
}
.typecho-page-title h2:before {
    content: "#";
    margin-right: 6px;
    color: #ff6d6d;
    font-size: 20px;
    font-weight: 600;
}
.themeConfig h3 {
    color: #737373;
    font-size: 20px;
}
.themeConfig h3:before  {
    content: "[";
    margin-right: 5px;
    color: #ff6d6d;
    font-size: 25px;
}
.themeConfig h3:after {
    content: "]";
    margin-left: 5px;
    color: #ff6d6d;
    font-size: 25px;
}
.info{
    border: 1px solid #ffadad;
    padding: 20px;
    margin: -15px 10px 25px 0;
    background: #ffffff;
    border-radius: 5px;
    color: #ff6d6d;
}
</style>';
echo '<span class="themeConfig"><h3>博客信息</h3></span>';
//博客信息
    $profile = new Typecho_Widget_Helper_Form_Element_Text('profile', NULL,'images/akinadeaava.jpg', _t('博主头像地址'), _t('默认值images/akinadeaava.jpg，图片位置/usr/themes/Akina/images/akinadeaava.jpg'));
    $form->addInput($profile);
	
    $sub = new Typecho_Widget_Helper_Form_Element_Text('sub', NULL,'个人博客', _t('网站副标题'), _t('默认内容"个人博客"'));
    $form->addInput($sub);
	
    $headerinfo = new Typecho_Widget_Helper_Form_Element_Text('headerinfo', NULL,'Carpe Diem and Do what I like', _t('头部内容'), _t('首页头部介绍'));
    $form->addInput($headerinfo);
	
    $NOTICE = new Typecho_Widget_Helper_Form_Element_Text('NOTICE', NULL,'我很荣幸的启用了Akina主题', _t('公告内容'), _t('首页公告内容'));
    $form->addInput($NOTICE);
	
    $ICP = new Typecho_Widget_Helper_Form_Element_Text('ICP', NULL,'Carpe Diem and Do what I like', _t('ICP备案号'), _t('备案号（默认内容"Carpe Diem and Do what I like"）'));
    $form->addInput($ICP);
	
    $gongan = new Typecho_Widget_Helper_Form_Element_Text('gongan', NULL,'', _t('公安联网备案'), _t('格式“X公安备案xxxxxxxxxxxxxx号”（没有不填即可）'));
    $form->addInput($gongan);
	
//个人信息
    //新浪
    $SINA = new Typecho_Widget_Helper_Form_Element_Text('SINA', NULL,'https://weibo.com/', _t('<br><span class="themeConfig"><h3>个人信息</h3></span><div class="info">不填写相关信息时可以隐藏该信息和图标</div>新浪微博地址'), _t('默认新浪微博首页（请规范填写，需https://，http://或者//）'));
    $form->addInput($SINA);
    //微信
    $Wechat = new Typecho_Widget_Helper_Form_Element_Text('Wechat', NULL,'', _t('微信号'), _t('首页个人信息'));
    $form->addInput($Wechat);
    //QQ
    $QQnum = new Typecho_Widget_Helper_Form_Element_Text('QQnum', NULL,'', _t('QQ信息'), _t('首页个人信息'));
    $form->addInput($QQnum);
    //酷安
    $coolapk = new Typecho_Widget_Helper_Form_Element_Text('coolapk', NULL,'', _t('酷安ID'), _t('填写酷安用户名'));
    $form->addInput($coolapk);
    $coolapkLink = new Typecho_Widget_Helper_Form_Element_Text('coolapkLink', NULL,'', _t(' '), _t('填写酷安用户链接，APP-我-点头像-右上角分享-复制链接'));
    $form->addInput($coolapkLink);
    //QQ空间
    $Qzone = new Typecho_Widget_Helper_Form_Element_Text('Qzone', NULL,'', _t('QQ空间信息'), _t('首页个人QQ空间信息:https://user.qzone.qq.com/QQ号码'));
    $form->addInput($Qzone);
    //Github
    $Github = new Typecho_Widget_Helper_Form_Element_Text('Github', NULL,'https://github.com/', _t('Github地址'), _t('Github主页地址（请规范填写，需https://，http://或者//）'));
    $form->addInput($Github);
    //哔哩哔哩
    $Bilibili = new Typecho_Widget_Helper_Form_Element_Text('Bilibili', NULL,'https://www.bilibili.com/', _t('Bilibili地址'), _t('Bilibili主页地址（请规范填写，需https://，http://或者//）'));
    $form->addInput($Bilibili);
	
//文章推荐
    $sticky = new Typecho_Widget_Helper_Form_Element_Text('sticky', NULL,NULL, _t('<br><span class="themeConfig"><h3>文章推荐</h3></span>文章置顶'), _t('置顶的文章cid，按照排序输入, 请以半角逗号,或空格分隔'));
    $form->addInput($sticky);
	
    $featureCids = new Typecho_Widget_Helper_Form_Element_Text('featureCids', NULL,NULL, _t('聚焦内容'), _t('请以半角逗号,或空格分隔'));
    $form->addInput($featureCids);
	
//加速设置
    $DNS = new Typecho_Widget_Helper_Form_Element_Text('DNS', NULL,'https://cdn.zhebk.cn', _t('<br><span class="themeConfig"><h3>加速设置</h3></span><div class="info">劣质CDN甚至会拖慢网站的速度，图标异常请自行解决跨域问题。CDN付费用户注意，该操作会让你的钱包遭受不可逆的降维打击。</div>DNS预解析加速'), _t('比如填写引用图片的域名（请规范填写，需https://，http://或者//）'));
    $form->addInput($DNS);
	
    $CDNURL = new Typecho_Widget_Helper_Form_Element_Text('CDNURL', NULL,NULL, _t('CDN镜像加速'), _t('填写CDN域名（请规范填写，需https://，http://或者//，末尾不加/）'));
    $form->addInput($CDNURL);
	
//外观设置
    $headimg = new Typecho_Widget_Helper_Form_Element_Text('headimg', NULL,'images/headerbg.jpg', _t('<br><span class="themeConfig"><h3>外观设置</h3></span>首页头部图'), _t('默认值images/headerbg.jpg，图片位置/usr/themes/Akina/images/headerbg.jpg'));
    $form->addInput($headimg);
	
    $menu = new Typecho_Widget_Helper_Form_Element_Checkbox('menu', 
    array(
	'show' => _t('一直显示菜单'),
	'indexbg' => _t('一直显示首页大图'),
	'page' => _t('使用ajax加载文章'),
	'xl' => _t('下拉自动加载文章'),
	),
    array('page'), _t('其他设置'));
    $form->addInput($menu->multiMode());
}
//判断本地、cdn和自定义资源加载逻辑
function authorProfile($src,$theurl){
    if($src){
        if(substr($src,0,1)=="i"){
            $src = $theurl . $src;
        }
    }
    return $src;
}
//阅读次数统计
function Postviews($archive) {
    $db = Typecho_Db::get();
    $cid = $archive->cid;
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
    }
    $exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
    if ($archive->is('single')) {
        $cookie = Typecho_Cookie::get('contents_views');
        $cookie = $cookie ? explode(',', $cookie) : array();
        if (!in_array($cid, $cookie)) {
            $db->query($db->update('table.contents')
                ->rows(array('views' => (int)$exist+1))
                ->where('cid = ?', $cid));
            $exist = (int)$exist+1;
            array_push($cookie, $cid);
            $cookie = implode(',', $cookie);
            Typecho_Cookie::set('contents_views', $cookie);
        }
    }
    return $exist;
}
//获取文章第一张图片
function img_postthumb($content) {
	preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $content, $thumbUrl);  //通过正则式获取图片地址
	$img_src = $thumbUrl[1][0];  //将赋值给img_src
	$img_counter = count($thumbUrl[0]);  //一个src地址的计数器  
	switch ($img_counter > 0) {
		case $allPics = 1:
			return $img_src;  //当找到一个src地址的时候，输出缩略图
			break;
		default:
			return "";  //没找到(默认情况下)，不输出任何内容
   };
}
//数据库查询相邻文章链接与标题
function queryNextPrev($mode, $widget){
    $where = $mode ? 'table.contents.created < ?' : 'table.contents.created > ?';
    $sorted = $mode ? Typecho_Db::SORT_DESC : Typecho_Db::SORT_ASC;
    $options = Helper::options();
    $db = Typecho_Db::get();
    $query = $db->select()->from('table.contents')
        ->where($where, $widget->created)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $widget->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', $sorted)
        ->limit(1);
    $content = $db->fetchRow($query);
    if ($content) {
        $content = $widget->filter($content);
        $title = $content['title'];
        $link = $content['permalink'];
      
        $result = array('title' => $title, 'link' => $link);
        return $result;
    } else {
        return false;
    }
}
//输出相邻文章链接与标题
function theNextPrev($widget){
    $html = '';
    $prevResult = queryNextPrev(true, $widget);
    $nextResult = queryNextPrev(false, $widget);
    if (!$prevResult && !$nextResult) {
        //第一篇文章，什么也不需要输出
        $html .= '';
    } else if (!$nextResult) {
        $html .= '<div class="post-nepre half next" style="width:100%;"><a href="' . $prevResult["link"] . '" rel="next"><div class="background" style="background-image:url(/usr/themes/Akina/images/random/deu' . mt_rand(1,7). '.jpg);"></div><span class="label">Next Post</span><div class="info"><h3>' . $prevResult["title"] . '</h3><hr></div></a></div>';
    } else if (!$prevResult) {
        $html .= '<div class="post-nepre half previous"style="width:100%;"><a href="' . $nextResult["link"] . '" rel="prev"><div class="background" style="background-image:url(/usr/themes/Akina/images/random/deu' . mt_rand(1,7). '.jpg);"></div><span class="label">Previous Post</span><div class="info"><h3>' . $nextResult["title"] . '</h3><hr></div></a></div>';
    } else {
        $html .= '<div class="post-nepre half previous"><a href="' . $nextResult["link"] . '" rel="prev"><div class="background" style="background-image:url(' . theurl . 'images/random/deu' . mt_rand(1,7). '.jpg);"></div><span class="label">Previous Post</span><div class="info"><h3>' . $nextResult["title"] . '</h3><hr></div></a></div>';
		$html .= '<div class="post-nepre half next"><a href="' . $prevResult["link"] . '" rel="next"><div class="background" style="background-image:url(' . theurl . 'images/random/deu' . mt_rand(1,7). '.jpg);"></div><span class="label">Next Post</span><div class="info"><h3>' . $prevResult["title"] . '</h3><hr></div></a></div>';
    }
    echo $html;
}
//修改后台设置适应模板
function themeInit($archive){
	Helper::options()->commentsPageBreak = true;		             //启用分页
	Helper::options()->commentsPageDisplay = 'first';	             //在列出时将第一页作为默认显示
	Helper::options()->commentsOrder = 'DESC';                       //将较新的的评论显示在前面
	Helper::options()->commentsHTMLTagAllowed = '<img src="">';      //评论允许img标签
}
//评论添加回复@标记
function get_commentReply_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a href="#" rel="nofollow" class="cute atreply">@' . $author . '</a> : ';
        echo $href;
    }
}
//公安联网备案,获取备案号
function gonganbeian($str){
    $str=trim($str);
    for($i=0;$i<strlen($str);$i++){
        if(is_numeric($str[$i])){
            $result.=$str[$i];
        }
    }
    if(empty($result)){
        return '';
    }else{
        return $result;
    }
}
//随机文章
function getRandomPosts($limit = 10){
    $db = Typecho_Db::get();
    $adapterName = $db->getAdapterName();//兼容非MySQL数据库
    if($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite'){
        $order_by = 'RANDOM()';
    }else{
        $order_by = 'RAND()';
    }
    $sql = $db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('table.contents.created <= ?', time())
        ->where('type = ?', 'post')
        ->limit($limit)
        ->order($order_by);
    $result = $db->fetchAll($sql);
	if($result){
		foreach($result as $val){
			$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
			$post_title = htmlspecialchars($val['title']);
			$permalink = $val['permalink'];
			echo '<li><a href="'.$permalink.'" title="'.$post_title.'" target="_blank">'.$post_title.'</a></li>';
		}
	}
}
?>
