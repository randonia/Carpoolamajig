<?= generateHeader($title,base_url())?>
<?= closeHeader()?>
<h1>Login to Carpoolamajig</h1>
<div id="body">
       <p>
       <? 
       if($this->session->flashdata('error')){
           echo $this->session->flashdata('error');
       }
       ?>
       Need an  an account? Register <a href="register">here</a>
       <form name="loginForm" action="login/commitForm/" method="post">
       Username: <input type="text" name="username" value="<?
       if($this->session->flashdata('username')){ 
           echo $this->session->flashdata('username');
       }?>"><br>
       Password: <input type="password" name="password"><br>
       <input type="submit">
       </form>
       </p>
</div>
<?= generateFooter()?>
