<?php
include 'config/connection.php';
include 'models/functions.php';

$bloginfo = '';
$blogID = '';
if (!isset($_SESSION['korisnik'])) {
    header('Location:index.php');
}
if (isset($_POST['blogID'])) {
    $headline = "<h1>Update blog</h1>";
    $blogID = $_POST['blogID'];
    $bloginfo = getItemsByID('blogs', $blogID);
    $action = 'models/update_blog.php';
    $btnname = 'blogchange_update';
} else {
    $headline = "<h1>Insert blog</h1>";
    $action = 'models/insert_blog.php';
    $btnname = 'blogchange_insert';
}
$categories = getAllFromTable('categories');
if (isset($_SESSION['korisnik'])) {
    $userid = $_SESSION['korisnik']->id;
}
//   var_dump($bloginfo);
?>
<section class="section-margin--small section-margin">
    <div class="container" style="background-color:#f2f3f7;">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <?= $headline ?>
            </div>
            <div class="col-md-8 offset-2 mt-5">

                <form method="POST" action="<?= $action ?>" class="form-contact contact_form" id="contactForm" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-lg-5">
                            <input type="hidden" name="blogid" id='blogid'
                             value="<?php if ($blogID != '') {
                                               echo $blogID;
                                         } else {
                                 echo '';
                                              } ?>" />
                            <input type="hidden" name="userid" id='userid' value="<?= $userid ?>" />

                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text"
                                 value="<?php if ($bloginfo != '') { echo $bloginfo->item_name;}  ?>">
                            </div>
                            <div class="form-group">
                                <select name="cat" id="cat" class="form-control">
                                    <option value="
                                    <?php if ($bloginfo != '') {
                                          echo $bloginfo->kat_id;
                                             } else {
                                                   echo 0;
                                         } ?>">
                                        <?php if ($bloginfo != '') {
                                            echo $bloginfo->kat;
                                        } else {
                                            echo 'Choose Category';
                                        } ?></option>
                                    <?php foreach ($categories as $c) : ?>
                                        <option value="<?= $c->id ?>"><?= $c->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="blogimage" id="blogimage" />
                                <p class="text-error"></p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <textarea class="form-control different-control w-100" name="message"
                                 id="message" cols="30" rows="5"
                                 value="<?php if ($bloginfo != '') {echo $bloginfo->info; } ?>"placeholder="Enter Message">
                                        <?php if ($bloginfo != '') { echo $bloginfo->info; } ?>
                                </textarea>
                                <p class="text-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" name="<?= $btnname ?>" class="button button--active button-contactForm">
                            Make Changes
                        </button>
                        <br/>
                        <?php
                        if (isset($_SESSION['error_messages']) && is_array($_SESSION['error_messages']) && !empty($_SESSION['error_messages'])) :
                            // Loop through the error messages and display them in an alert box
                            foreach ($_SESSION['error_messages'] as $error_message) :
                                // Clear the error messages from the session
                                unset($_SESSION['error_messages']);
                        ?>
                                <i style="color: red;"><?= $error_message ?></i><br>
                        <?php endforeach;
                        endif; ?>

                        <?php 
                        if (isset($_SESSION['success_message'])) {
                            echo '<i style="color:green;">' . $_SESSION['success_message'] . '</i>';
                            unset($_SESSION['success_message']);
                        }
                        ?>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <a id="backtotop"></a>
</section>