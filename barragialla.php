
<div id="barraLogin">
			<?php if($_SESSION['logged']==1){?>
				<div id="menuLoginLogout">Benvenuto <a href="#" style="font-weight:bold"><?php echo $_SESSION['nome']." ".$_SESSION['cognome'];?></a><?php #if($_SESSION['fblogin']!=1){?> | <a href="#" id="logoutgiallo">Logout</a><?php #} ?></div>
			<?php }else{?>
				<div id="menuLogin"><a href="#" onclick="javascript:return false;">Login</a> | <a href="#" onclick="javascript:return false;"><?php strtoupper(_e($lang_registrati));?></a></div>
			<?php }?>
</div>