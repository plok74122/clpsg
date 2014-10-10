<div class="main">
	<div class="main-navigation">
		<div class="round-border-topright"></div>
        <h1 class="first">登入資訊</h1>
        <div class="loginform">
          <form method="post" action="index.html"> 
            <fieldset>
              <p><label for="username_1" class="top">帳號:</label><br />
                <input type="text" name="username_1" id="username_1" tabindex="1" class="field" onkeypress="return webLoginEnter(document.loginfrm.password);" value="" /></p>
    	      <p><label for="password_1" class="top">密碼:</label><br />
                <input type="password" name="password_1" id="password_1" tabindex="2" class="field" onkeypress="return webLoginEnter(document.loginfrm.cmdweblogin);" value="" /></p>
    	      <p><input type="submit" name="cmdweblogin" class="button" value="登入"  /></p>
	        </fieldset>
          </form>
        </div>
			<h1 class="first">人數統計</h1>
				<!-- Navigation with grid style -->
				<dl class="nav3-grid">
					<dt><a href="">輸入參訪人數</a></dt>
					<dt><a href="">統計列表(前20)</a></dt>
					<dt><a href="">區段統計查詢</a></dt>
				</dl>
			<h1 class="first">問卷統計</h1>
				<!-- Navigation with grid style -->
				<dl class="nav3-grid">
					<dt><a href="">輸入問卷內容</a></dt>
					<dt><a href="">統計列表(前20)</a></dt>
					<dt><a href="">問卷查詢</a></dt>
				</dl>
	</div><!--結尾在main_content.php-->