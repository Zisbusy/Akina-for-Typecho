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
    $logo = new Typecho_Widget_Helper_Form_Element_Text('logo', NULL,'images/akina.png', _t('网站logo地址'), _t('默认值images/akina.png，图片位置/usr/themes/Akina/images/akina.png'));
    $form->addInput($logo);
	
    $profile = new Typecho_Widget_Helper_Form_Element_Text('profile', NULL,'images/akinadeaava.jpg', _t('博主头像地址'), _t('默认值images/akinadeaava.jpg，图片位置/usr/themes/Akina/images/akinadeaava.jpg'));
    $form->addInput($profile);
	
    $wedo = new Typecho_Widget_Helper_Form_Element_Text('wedo', NULL,'images/donate/wedo.png', _t('微信收款码'), _t('默认值images/donate/wedo.png，图片位置/usr/themes/Akina/images/donate/wedo.png'));
    $form->addInput($wedo);
    
    $alido = new Typecho_Widget_Helper_Form_Element_Text('alido', NULL,'images/donate/alido.png', _t('支付宝收款码'), _t('默认值images/donate/alido.png，图片位置/usr/themes/Akina/images/donate/alido.png'));
    $form->addInput($alido);
	
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
	
    //网易云音乐
    $Music = new Typecho_Widget_Helper_Form_Element_Text('Music', NULL,'https://music.163.com/', _t('网易云音乐用户ID'), _t('登陆网页版网易云音乐，点击个人主页。https://music.163.com/#/user/home?id=这里是ID'));
    $form->addInput($Music);
	
//文章推荐
    $sticky = new Typecho_Widget_Helper_Form_Element_Text('sticky', NULL,NULL, _t('<br><span class="themeConfig"><h3>文章推荐</h3></span>文章置顶'), _t('填写文章cid，按照输入顺序显示（请以半角逗号,或空格分隔）'));
    $form->addInput($sticky);
	
    $featureCids = new Typecho_Widget_Helper_Form_Element_Text('featureCids', NULL,NULL, _t('聚焦内容'), _t('填写文章cid，按照输入顺序只显示前三个（请以半角逗号,或空格分隔）'));
    $form->addInput($featureCids);
	
//广告设置
    $adPostImg = new Typecho_Widget_Helper_Form_Element_Text('adPostImg', NULL,'', _t('<br><span class="themeConfig"><h3>广告设置</h3></span><div class="info">不填写相关信息时可以隐藏该广告展示</div>文章页广告'), _t('填写广告图片链接'));
    $form->addInput($adPostImg);
    $adPostkLink = new Typecho_Widget_Helper_Form_Element_Text('adPostkLink', NULL,'', _t(' '), _t('填写文章页广告超链接'));
    $form->addInput($adPostkLink);
	
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
    'transparent' => _t('导航栏透明'),
    'indexbg' => _t('一直显示首页大图'),
    'feature' => _t('一直显示聚焦内容'),
    'page' => _t('使用ajax加载文章'),
    'xl' => _t('下拉自动加载文章'),
    'dark' => _t('开启夜间模式(跟随系统)'),
    ),
    array('page'), _t('其他设置'));
    $form->addInput($menu->multiMode());
	
    $postDoc = new Typecho_Widget_Helper_Form_Element_Radio('postDoc', array(
        'leftDoc' => _t('左侧显示'),
        'rightDoc' => _t('右侧显示'),
        'none' => _t('不显示')
        ), 'none', _t('开启文章目录'));
    $form->addInput($postDoc);
	
    $cssCode = new Typecho_Widget_Helper_Form_Element_Textarea('cssCode', null, null, _t('自定义 CSS'), _t('可以方便的自定义博客样式，避免修改源码影响主题模板迭代。(请编写完整的style标签)'));
    $form->addInput($cssCode);
    
    $jsCode = new Typecho_Widget_Helper_Form_Element_Textarea('jsCode', null, null, _t('自定义 JS'), _t('可以方便的添加js代码，统计代码可以填写到这里。(请编写完整的script标签)'));
    $form->addInput($jsCode);
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
// 缩略图设置
function themeFields($layout){
    $radioPostImg = new Typecho_Widget_Helper_Form_Element_Radio('radioPostImg', array(
        'custom' => _t('自定义'),
        'random' => _t('随机图'),
        'none' => _t('不显示')
        ), 'none', _t('开启文章/页面缩略图'));
    $layout->addItem($radioPostImg);
    $thumbnail = new Typecho_Widget_Helper_Form_Element_Text('thumbnail', null, null, _t('文章/页面缩略图Url'), _t('需要带上http(s)://'));
    $icon = new Typecho_Widget_Helper_Form_Element_Text('icon', null, null, _t('文章/页面首页图标Url'), _t('需要带上http(s)://'));
    $dtMode = new Typecho_Widget_Helper_Form_Element_Radio('dtMode', array(true => _t('开启'), false => _t('关闭')), false, _t('文章动态模式'), _t('该文章在列表展示方式为动态模式'));
    $layout->addItem($thumbnail);
    $layout->addItem($icon);
    $layout->addItem($dtMode);
}
/**
     * 从数据库查询上/下篇文章内容信息
     * 返回内容包括文章缩略、标题、链接
     *
     * @param bool $mode 查询上或下篇
     * @param mixed $archive
     *
     * @return array|bool
     */
// 相关代码感谢 https://github.com/Siphils/Typecho-Theme-Aria/blob/master/lib/Contents.php
function getNextPrev($mode, $archive){
    $options = Helper::options();
    $db = Typecho_Db::get();
    //数据准备
    $where = null;
    $sorted = null;
    $name = 'thumbnail';
    $thumbnail = 'str_value';
    //$mode为true查询上文，false查询下文
    if ($mode) {
        $where = 'table.contents.created < ?';
        $sorted = Typecho_Db::SORT_DESC;
    } else {
        $where = 'table.contents.created > ?';
        $sorted = Typecho_Db::SORT_ASC;
    }

    $query = $db->select()->from('table.contents')
        ->where($where, $archive->created)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $archive->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', $sorted)
        ->limit(1);
    $content = $db->fetchRow($query);
    $result = null;
    if ($content) {
        $content = $archive->filter($content);
        $title = $content['title'];
        $link = $content['permalink'];

        $query = $db->select()->from('table.fields')
            ->where('table.fields.cid = ?', $content['cid'])
            ->where('table.fields.name = ?', $name)
            ->limit(1);

        $content = $db->fetchRow($query);
        if ($content) {
            $img = $content[$thumbnail] ? $content[$thumbnail] : '/usr/themes/Akina/images/random/deu' . mt_rand(1,7). '.jpg';
        } else {
            $img = '/usr/themes/Akina/images/random/deu' . mt_rand(1,7). '.jpg';
        }

        $result = array('img' => $img, 'title' => $title, 'link' => $link);
    } else {
        $result = false;
    }
    return $result;
}
//输出相邻文章链接，标题，缩略图
function theNextPrev($widget){
    $html = '';
    $prevResult = getNextPrev(true, $widget);
    $nextResult = getNextPrev(false, $widget);
    if (!$prevResult && !$nextResult) {
        //第一篇文章，什么也不需要输出
        $html .= '';
    } else if (!$nextResult) {
        $html .= '<div class="post-nepre half next" style="width:100%;"><a href="' . $prevResult["link"] . '" rel="next"><div class="background" style="background-image:url(' . $prevResult["img"] . ');"></div><span class="label">Next Post</span><div class="info"><h3>' . $prevResult["title"] . '</h3><hr></div></a></div>';
    } else if (!$prevResult) {
        $html .= '<div class="post-nepre half previous"style="width:100%;"><a href="' . $nextResult["link"] . '" rel="prev"><div class="background" style="background-image:url( '. $nextResult["img"] . ');"></div><span class="label">Previous Post</span><div class="info"><h3>' . $nextResult["title"] . '</h3><hr></div></a></div>';
    } else {
        $html .= '<div class="post-nepre half previous"><a href="' . $nextResult["link"] . '" rel="prev"><div class="background" style="background-image:url('. $nextResult["img"] .');"></div><span class="label">Previous Post</span><div class="info"><h3>' . $nextResult["title"] . '</h3><hr></div></a></div>';
		$html .= '<div class="post-nepre half next"><a href="' . $prevResult["link"] . '" rel="next"><div class="background" style="background-image:url('. $prevResult["img"] . ');"></div><span class="label">Next Post</span><div class="info"><h3>' . $prevResult["title"] . '</h3><hr></div></a></div>';
    }
    echo $html;
}
//修改后台设置适应模板
function themeInit($archive){
	Helper::options()->commentsPageBreak = true;		             //启用分页
	Helper::options()->commentsPageDisplay = 'first';	             //在列出时将第一页作为默认显示
	Helper::options()->commentsOrder = 'DESC';                       //将较新的的评论显示在前面
	Helper::options()->commentsHTMLTagAllowed = '<img src="">';      //评论允许img标签
	//文章目录
	if ($archive->is('single')) {
        $archive->content = createCatalog($archive->content);
    }
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
    $str = trim($str);
    $result = '';
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
//文章目录
//来源 https://www.offodd.com/76.html
//为文章标题添加锚点
function createCatalog($obj) {    
    global $catalog;
    global $catalog_count;
    $catalog = array();
    $catalog_count = 0;
    $obj = preg_replace_callback('/<h([1-3])(.*?)>(.*?)<\/h\1>/i', function($obj) {
        global $catalog;
        global $catalog_count;
        $catalog_count ++;
        $catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
        return '<h'.$obj[1].$obj[2].'><a id="cl-'.$catalog_count.'"></a>'.$obj[3].'</h'.$obj[1].'>';
    }, $obj);
    return $obj;
}
//输出文章目录容器
function getCatalog() {
    global $catalog;
    $index = '';
    if ($catalog) {
        $index = '<ul>'."\n";
        $prev_depth = '';
        $to_depth = 0;
        foreach($catalog as $catalog_item) {
            $catalog_depth = $catalog_item['depth'];
            if ($prev_depth) {
                if ($catalog_depth == $prev_depth) {
                    $index .= '</li>'."\n";
                } elseif ($catalog_depth > $prev_depth) {
                    $to_depth++;
                    $index .= '<ul>'."\n";
                } else {
                    $to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
                    if ($to_depth2) {
                        for ($i=0; $i<$to_depth2; $i++) {
                            $index .= '</li>'."\n".'</ul>'."\n";
                            $to_depth--;
                        }
                    }
                    $index .= '</li>';
                }
            }
            $index .= '<li><a href="#cl-'.$catalog_item['count'].'">'.$catalog_item['text'].'</a>';
            $prev_depth = $catalog_item['depth'];
        }
        for ($i=0; $i<=$to_depth; $i++) {
            $index .= '</li>'."\n".'</ul>'."\n";
        }
    $index = '<div id="toc-container">'."\n".'<div id="toc">'."\n".'<strong>文章目录</strong>'."\n".$index.'</div>'."\n".'</div>'."\n";
    }
    echo $index;
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
