<?php
session_start();
include "views/fixed/header.php";

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'home':
            include "views/pages/home.php";
            break;
        case 'contact':
            include "views/pages/contact.php";
            break;
        case 'detail_page':
             include "views/pages/detail_page.php";
            break;
            case 'posts':
                include "views/pages/posts.php";
               break;
        case 'login':
             include "views/pages/login.php";
            break;
        case 'register':
             include "views/pages/register.php";
            break;
        case 'logout':
             include "views/pages/logout.php";
            break;
            case 'blogger':
                include "views/pages/blogger.php";
               break;
               
         case'blog_form':
         include 'views/pages/crud_oper/blog_form.php';
         break;
         case'author':
            include 'views/pages/author.php';
            break;
        }}
        else{
    include "views/pages/home.php";
}
include "views/fixed/footer.php";
?>