<?php
include 'lang/GermanWords.php';
include 'config/route.php';
if(!isset($_SESSION['access_token'])) {
    header('Location: '.$absoluteUrl.'login.php');
}
include 'inc/header.php';
include 'inc/sidebar.php';
?>
 

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Andere das Passwort</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo $absoluteUrl;?>"><i class="fa fa-dashboard"></i> <?php echo $home; ?></a></li>
            <li><a href="<?php echo $absoluteUrl;?>profil"> Profil</a></li>
            <li class="active"> Andere das Passwort</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                      <p>Die mit * gekennzeichneten Felder sind Pflichtfelder</p>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="changePassword">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="callout callout-info">
                                        <p>Bitte verwenden Sie ein starkes Passwort.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="current_password">Derzeitiges Passwort*</label><span class="error-text"></span>
                                        <input type="password" class="form-control" id="current_password" name="current_password" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">Neues Passwort*</label><span class="error-text"></span>
                                        <input type="password" class="form-control" id="new_password" name="new_password" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Bestätige neues Passwort*</label><span class="error-text"></span>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input class="btn btn-success" type="submit" id="saveFormBtn" name="Aktualisieren" value="Aktualisieren">
                            <a href="<?php echo $absoluteUrl;?>profil" class="btn btn-default" id="cancelBtn">Abbrechen</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include 'inc/footer.php';
?>