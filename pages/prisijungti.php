<?php
/**
 * Created by PhpStorm.
 * User: Karolis
 * Date: 2017-10-23
 * Time: 22:08
 */

if(!defined("EI")) { header("Location: ../"); exit(); }

if($EIV->arPrisijunges()) { $EIV->eiti("Location: ../"); }

if(isset($_POST['ei_jungtis'])) {
    $ivestas_login = trim($_POST['ei_user_login']);
    $ivestas_pass = trim($_POST['ei_user_password']);

    if($ivestas_login == "") {
        $error[] = "Nepavyko!   (╯︵╰,)";
    }
    else {
        if($EIV->prisijungti($ivestas_login, $ivestas_login, $ivestas_pass)) {
            $EIV->eiti('pradzia');
            //$error[] = "Pavyko!   ヅ";
        } else {
            $error[] = "Nepavyko!   (╯︵╰,)";
        }
    }
}
/*
if($EIV->sukurti("Karolis",null,null,null,1,"admin","email@test.lt","123456"))
{
    echo "Sukurta!";
}
else echo $EIV->klaidos();
*/
?>

<form method="post">
    <h2>Prisijunkite</h2><hr />
    <?php
    if(isset($error))
    {
        foreach($error as $error)
        {
            ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
            <?php
        }
    }
    else if(isset($_GET['joined']))
    {
        ?>
        <div class="alert alert-info">
            <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
        </div>
        <?php
    }
    ?>
    <div class="form-group">
        <input type="text" class="form-control" name="ei_user_login" placeholder="Kas jūs toks?" value="<?php if(isset($error)){echo $ivestas_login;}?>" />
        <input type="password" class="form-control" name="ei_user_password" placeholder="" />
        <button type="submit" class="btn btn-block btn-primary" name="ei_jungtis">Prisijungti</button>
    </div>
</form>

