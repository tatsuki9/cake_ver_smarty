{wrap_template file="plain" title="ログイン"}

<?php echo $this->Html->css('login'); ?>
<!--  ヘッダー-->
<table border="0" width="100%">
	<tbody>
		<tr>
			<td width="150" rowspan="2">
				aaaaaaaaaaaaaaaaaaaa
			</td>
			<td colspan="2">
				<ul id="menu-0">
					<li>
						<a href="/home" target="_top">Home</a>
					</li>
					<li>
						<a href="/search" target="_top">Search</a>
					</li>
					<li>
						<a href="/Organize" target="_top">Organize</a>
					</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td>
				<font size="+2">
					<b>View Copyright/Email/Url Analysis</b>
				</font>
			</td>
			<td align="right" valign="bottom">
				<small>
					<a href="/login"><b>login</b></a>
				</small>
			</td>
		</tr>
	</tbody>
</table>
<hr>

<!-- メインコンテンツ -->
<div id="contents">
	<div class="bnr-area">
		<!-- テーブル1 -->
		<ul>
			<!-- テーブル1 カラム1 -->
			<li>
				<!-- テーブル2 -->
				<div class="col w950">
					<!-- テーブル2　カラム1 -->
					<p class="image">
					<img src="../img/fig_index_01.jpg">
					</p>
					
					<!-- テーブル2　カラム2 -->
					<div class="marketing-section-signup">
						<!-- テーブル2 カラム2 -->
						<form accept-charset="UTF-8" action="/join" autocomplete="off" class="form-signup-home" method="post">
							<dl class="form">
								<dd>
									<input type="text" name="data[User][login]" class="textfield" placeholder="Pick a username" aria-label="Pick a username" data-autocheck-url="/username" autofocus>
								</dd>
							</dl>
							<dl class="form">
								<dd>
									<input type="text" name="data[User][addr]" class="textfield" placeholder="Your email" aria-label="Your email" data-autocheck-url="/email" autofocus>
								</dd>
							</dl>
							<dl class="form">
								<dd>
									<input type="password" name="data[User][password]" class="textfield" placeholder="Create a password" aria-label="Create a password" data-autocheck-url="/password" autofocus>
								</dd>
							</dl>
							<input type="hidden" name="source_label" value="HomePage Form">
							<button class="btn btn-primary btn-block" type="submit">Sign Up</button>
						</form>
					</div>
				</div>
			</li>
			<!-- テーブル1 カラム2 -->
			<li class="last">
				<div class="col w10 pt25"></div>
			</li>
		</ul>
	</div>
	<hr>

	<div class="newstopics">
		<h2>
			<img src="../img/contents_title_bar.jpg">		
		</h2>
		<ul>
			<li>
				<dl>
					<dt>
						<span class="date">2015/08/06</span>
						<span class="category"><img src="../img/update_flag.jpg"></span>
					</dt>

					<dd>
						hogehogehogehoge
					</dd>
				</dl>
			</li>
			<!-- データベースから引っ張ってくる -->
		</ul>
	</div>
</div>

<div class="box">box</div>
<div class="relative">relative</div>
<div class="box">box</div>

<style>
.box {
	width: 100px;
	line-height: 100px;
	background: #bbb;
	text-align: center;
}

.relative {
	position: relative;
	top: 100px;
	left: 100px;
	width: 500px;
	line-height: 50px;
	background: #f8b862;
	text-align: center:;
}
</style>



<!-- フッター-->



 
<!--  レイアウトファイル　コンテンツ終了