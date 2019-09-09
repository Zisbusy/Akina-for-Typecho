<?php
/**
 * archives
 *
 * @package custom
 */
  $this->need('header.php'); ?>
<div class="headertop"></div>
<div id="content" class="site-content">
	<article class="hentry">
	<div id="archives-temp">
		<h2>文章归档</h2>
			<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
				$year=0; $mon=0; $i=0; $j=0;
				$output = '<div id="archives-content">';
				while($archives->next()):
					$year_tmp = date('Y',$archives->created);
					$mon_tmp = date('m',$archives->created);
					$y=$year; $m=$mon;
					if ($mon != $mon_tmp && $mon > 0) $output .= '</div>';
					if ($year != $year_tmp && $year > 0) $output .= '</div>';
					if ($year != $year_tmp) {
						$year = $year_tmp;
					}
					if ($mon != $mon_tmp) {
						$mon = $mon_tmp;
						$output .= '<div class="archive-title"><span class="ar-time"><i class="iconfont">&#xe604;</i></span><h3>'. $year .'-'. $mon .'</h3><div class="archives archives-4" id="monlist">';
					}
				$output .= '<span class="ar-circle"></span><div class="arrow-left-ar"></div><div class="brick"><a href="'.$archives->permalink .'"><span class="time"><i class="iconfont">&#xe604;</i>'. $mon .'-'.date('d',$archives->created).'</span>'. $archives->title .'<em>('. $archives->commentsNum.')</em></a></div>';
				endwhile;
				echo $output;
			?>
		</article>
		</div>
	</div>
</div>
</section>
<?php $this->need('footer.php'); ?>