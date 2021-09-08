# Akina-for-Typecho
Akina for Typecho 主题模板

![image](https://github.com/Zisbusy/Akina-for-Typecho/blob/master/Akina-img/Akina.jpg)

## 模版特点

1. 同时采用`QQ`和`Gravatar`，来适应国内环境，QQ邮箱优先使用`QQ`头像，
2. 平滑滚动，感谢开源项目[`smoothscroll-for-websites`](https://github.com/gblazex/smoothscroll-for-websites)
3. 表情，感谢开源项目[`OwO`](https://github.com/DIYgod/OwO)
4. 支持`ajax`评论
5. 响应式设计，多端无障碍浏览

## 安装方法

将Akina文件夹放到typecho下/usr/themes，在后台启用。 
打开"设置外观"填写相关信息   
建议安装随主题附带的links插件，（不安装也可以写html实现友链，代码在下面）   

## 更新方法

小版本：将Akina文件夹覆盖到typecho下/usr/themes。
大版本：检查后台设置项，文章关键字。

### 关于表情

主题自带一种表情包，可仿照其格式自行添加表情，但是注意本主题仅且只能使用图标包，即“img”标签，

### 主页home设置

![image](https://github.com/Zisbusy/Akina-for-Typecho/blob/master/Akina-img/Akina-home.png)

Akina 提供了一个独特的首页页面  
在博客后台-设置-阅读-站点首页  
选择直接调用 `hmoe.php`模板文件，并勾选 同时将文章列表页路径更改为`/blog`（当然可以改成其他的，但要同时修改模板里路径`home.php`）  

### 其他页面

在管理-独立页面-新增页面中  
友链建议为`links.html`结尾。  
关于建议为`about.html`结尾。  
标签云建议为`tags.html`结尾。  
留言建议为`message.html`结尾。  
归档建议为`archives.html`结尾。  
自定义模板选择名字相同模板（如果没有选择page），建议请提前[配置好伪静态](https://www.typechodev.com/theme/478.html)。

### 友链写法
安装links插件后不需要写html了
```html
!!!
<br/>
<div class="links">
    <ul class="link-items fontSmooth">
        <li class="link-item"><a class="link-item-inner effect-apollo" href="http://zhebk.cn/" title="我们，渺小到不可一世。" target="_blank" ><span class="sitename">纸盒博客</span><div class="linkdes">我们，渺小到不可一世。</div></a></li>
        ......
    </ul>
</div>
!!!
```

### 画廊图片写法
已经使用正则替换自动化，不需要写了。
```html
!!!
<a href="大图片地址" alt="说明" title="标题"><img class="aligncenter" src="小图片地址" alt="说明"></a>
!!!
```

### 下载按钮写法

```html
!!!
<p>
<a id="download_link" class="download" href="下载url" rel="external" target="_blank" title="下载地址">  
<span><i class="iconfont icon-download"></i>点击下载</span>
</a>
</p>
!!!
```

### 文章特殊标签样式

![image](https://github.com/Zisbusy/Akina-for-Typecho/blob/master/Akina-img/h2-h5.jpg)

### CDN镜像加速

请在CDN服务商配置加速域名后在后台模板设置按提示填写域名即可。    
如图标出现错误后请根据CDN服务商提示来解决跨域问题，    
注：七牛云没有设置选项，请提交工单。将CDN响应头设置成 Access-Control-Allow-Origin: *    
2021-08-01:似乎已经可以在七牛后台直接设置了。  

镜像加速地址同源站地址如:    
https://zhebk.cn/usr/themes/Akina/images/favicon.ico    
https://cdn.zhebk.cn/usr/themes/Akina/images/favicon.ico    

提示：劣质CDN甚至会拖慢网站的速度    
CDN付费用户注意，请做好防盗链，不当操作会让你的钱包遭受不可逆的降维打击。    

### 使用技巧

1. 在文章编辑里添加自定义缩略图图片链接。可自定义页面(除了归档)的顶部图片,  默认随机使用`Akina\images\postbg`下图片。    
2. 在文章编辑里可开启动态式文章展示样式。使用动态样式时，文章首页不会看见标题，默认显示文章的前`70`个字符，可使用`<!--more-->`摘要分割线自定义显示内容。  
3. 可以填写页面首页图标来改变文章列表的小图
4. 文章小火花触发条件：阅读量大于等于2000。
5. 自定义聚焦文章后 头部图获取规则 自定义缩略图>默认
6. 修改样式可以使用自定义css、js

## 演示地址

[https://www.bilibili.com/video/av68759722/](https://www.bilibili.com/video/av68759722/)

## 特别感谢

感谢[Typecho](http://docs.typecho.org/doku.php)官方文档(虽然有点简陋)  
感谢[QQ爹博客](https://qqdie.com/)，直接或者间接的帮助  
感谢[FUIDESIGN](http://fui.im/)原作[Akina ](https://github.com/Xoin-Yang/Akina)(大佬的群 464877306 -永远的AKINA)  
以及[@友人C](https://www.ihewro.com/)`@WeX`[@Kit](http://www.aihack.cn/) (未艾特到的大佬请担待，记性不好，)  

