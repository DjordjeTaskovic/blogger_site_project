<?php
 function getAllBlogs(){   
     global $conn;
     $rez = $conn->prepare("SELECT 
     b.id as bID,
     b.name as blog_name,
     b.info,b.date,
     c.name as kat,
     s.url,s.alt,
     u.name as username
     FROM blogs b 
     inner join categories c on b.id_category=c.id 
     inner join images s on b.id_img=s.id 
     inner join users u on b.id_user=u.id");
     $rez->execute();
     $r = $rez->fetchAll();
    return $r;
}
function getAllFromTable($table){
    global $conn;
    $rez = $conn->prepare("SELECT * from $table");
    $rez->execute();
    $r = $rez->fetchAll();
   return $r;
}
function getAllUsers(){
    global $conn;
    $rez = $conn->prepare("SELECT u.*,r.name as rolename from users u inner join roles r on u.id_role = r.id ");
    $rez->execute();
    $r = $rez->fetchAll();
   return $r;
}
function getAllPosts(){
    global $conn;
    $rez = $conn->prepare("SELECT 
     p.id as post_ID,
     p.name as post_name,
     p.info,p.date,
     c.name as kat,
     s.url,s.alt,
     u.name as username
    FROM posts p 
    inner join categories c on p.id_category=c.id 
    inner join images s on p.id_img=s.id 
    inner join users u on p.id_user=u.id");
    $rez->execute();
    $r = $rez->fetchAll();
   return $r;
    
}
function getcommentsbyBlogID($ID){
    global $conn;
    $rez = $conn->prepare("SELECT 
    u.name as username,
    c.comment,
    c.date as comdate
     From comments c join users u on c.id_user=u.id where id_blogs = :ID");
    $rez->bindParam(":ID",$ID);
    $rez->execute();
    $r = $rez->fetchAll();
   return $r;
}
function getuserbyID($ID){
    global $conn;
    $rez = $conn->prepare("SELECT * From users where id = :ID");
    $rez->bindParam(":ID",$ID);
    $rez->execute();
    $r = $rez->fetch();
   return $r;
}
function getBlogsbyUserID($ID){
    global $conn;
    $rez = $conn->prepare("SELECT 
    b.id as bID,
    b.name as blog_name,
    b.info,b.date,
    c.name as kat,
    i.url,i.alt,
    u.name as username
     From blogs b
    inner join images i on b.id_img = i.id 
    inner join categories c on b.id_category = c.id 
    inner join users u on b.id_user = u.id 
    where b.id_user = $ID");
    $rez->bindParam(":ID",$ID);
    $rez->execute();
    $r = $rez->fetchAll();
   return $r;
}
function getuserimage($ID){
    global $conn;
    $rez = $conn->prepare("SELECT * From images where id = $ID");
    $rez->bindParam(":ID",$ID);
    $rez->execute();
    $r = $rez->fetch();
   return $r;
}
function getcommentsbyID($ID){
    global $conn;
    $rez = $conn->prepare("SELECT * From comments where id_blogs = $ID");
    $rez->bindParam(":ID",$ID);
    $rez->execute();
    $r = $rez->fetchAll();
   return $r;
}
function insert_User($ime,$email,$adresa,$sifra,$bdate,$role,$image_id){
    global $conn;
    $upit = "INSERT INTO `users` 
    (`id`, `name`, `email`, `address`, `password`,`birthdate`,`id_role`,`id_img`)
     VALUES 
     (NULL, :korisnik_ime, :mail, :address , :pass, :bdate, :uloga, :slikaid);";
    $priprema = $conn->prepare($upit);
    $priprema->bindParam(":korisnik_ime", $ime);
    $priprema->bindParam(":mail", $email);
    $priprema->bindParam(":address", $adresa);
    $priprema->bindParam(":pass", $sifra);
    $priprema->bindParam(":bdate", $bdate);
    $priprema->bindParam(":uloga", $role);
    $priprema->bindParam(":slikaid", $image_id);
     return $priprema;
}
function getUser($email, $sifra){
    global $conn;
    $upit="SELECT u.id,u.name as username,
    u.email,r.name as rolename
     FROM users u INNER JOIN roles r ON u.id_role = r.id WHERE 
     u.email = :email AND u.password = :pass";
            $priprema=$conn->prepare($upit);
            $priprema->bindParam(":email", $email);
            $priprema->bindParam(":pass", $sifra);
            $priprema->execute();
            return $priprema;
           //  $podaci = $priprema->fetch();
}
function getUser_id($ID){
    global $conn;
    $priprema=$conn->prepare("SELECT u.id,u.name as username,
    u.email,r.name as rolename
     FROM users u INNER JOIN roles r ON u.id_role = r.id 
     WHERE u.id = :id");
    $priprema->bindParam(":id", $ID);
    $priprema->execute();
    return $priprema;
    //  $podaci = $priprema->fetch()
}
//log
function getUser_email($email){
    global $conn;
            $priprema=$conn->prepare("SELECT *FROM users WHERE email = :email");
            $priprema->bindParam(":email", $email);
            $priprema->execute();
            return $priprema;
            //  $podaci = $priprema->fetch();
            
}
//log
function getUser_pass($pass){
    global $conn;
            $priprema = $conn->prepare("SELECT * FROM users WHERE password = :sifra");
            $priprema->bindParam(":sifra", $pass);
            $priprema->execute();
            return $priprema;
            //  $podaci = $priprema->fetch();
            
}
function getItemsByID($table,$ID){
    global $conn;
     $rez = $conn->prepare("SELECT 
     b.id as item_ID,
     b.name as item_name,
     b.info,b.date,
     c.name as kat,
     c.id as kat_id,
     s.url,s.alt,
     u.name as username
     FROM $table b 
     inner join categories c on b.id_category=c.id 
     inner join images s on b.id_img=s.id 
     inner join users u on b.id_user=u.id 
     where b.id = $ID");
     $rez->execute();
     $r = $rez->fetch();
    return $r;

}
function insert_Message($name, $email, $subject, $message){
    global $conn;
        $upit = "INSERT INTO messages (`id`,`name`, `email`, `subject`, `message`)
         VALUES(NULL,:ime, :mail, :predmet, :opisporuka);";
        $unos = $conn->prepare($upit);
        $unos->bindParam(":ime", $name);
        $unos->bindParam(":mail", $email);
        $unos->bindParam(":predmet", $subject);
        $unos->bindParam(":opisporuka", $message);
        $rezultat = $unos->execute();
        return $rezultat;
}
function Update_User($name,$address,$date,$message,$ID,$idimage){
    global $conn;
    $upit ="UPDATE users SET
    name=:username,
    address=:useraddress,
    birthdate=:userdate,
    about=:usermessage,
    id_img=:IDimage
    WHERE id = :userID";
    $unos=$conn->prepare($upit);
    $unos->bindParam(":username", $name);
    $unos->bindParam(":useraddress", $address);
    $unos->bindParam(":userdate", $date);
    $unos->bindParam(":usermessage", $message);
    $unos->bindParam(":userID", $ID);
    $unos->bindParam(":IDimage", $idimage);
    return $unos;
}
function Update_blog_Image($img,$imageID)
{
     global $conn;
    $priprema=$conn->prepare("UPDATE images SET 
    url = :url WHERE id = :id");
    $priprema->bindParam(":url", $img);
    $priprema->bindParam(":id", $imageID);
    return $priprema;
    
}
function update_Blog($subject,$message,$catid,$blogid){
    global $conn;
    $priprema=$conn->prepare("UPDATE blogs  SET 
    name = :subject,
    info =:info,
    id_category =:catid
     WHERE id = :id");
    $priprema->bindParam(":subject", $subject);
    $priprema->bindParam(":info", $message);
    $priprema->bindParam(":catid", $catid);
    $priprema->bindParam(":id", $blogid);
    return $priprema;
}
function getimageIDbyBlog($blogID)
{
    global $conn;
    $priprema=$conn->prepare("SELECT id_img FROM blogs WHERE id = :id");
    $priprema->bindParam(":id", $blogID);
    $priprema->execute();
    $r = $priprema->fetch();
    return $r;
}
function insert_Image($img){
    global $conn;
    $opis='insertedimage';
    $priprema = $conn->prepare("INSERT INTO images (`id`,`url`, `alt`)
     VALUES(null,:link,:opis)");
    $priprema->bindParam(":link", $img);
    $priprema->bindParam(":opis", $opis);
    return $priprema;
}
function insert_Blog($subject,$message,$imageID,$catid,$userid){
    global $conn;
    $priprema = $conn->prepare("INSERT INTO blogs
     (`id`,`name`,`info`,`id_img`,`id_category`,`id_user`)
     VALUES(null,:blogname,:bloginfo,:idimg,:idcat,:iduser)");
    $priprema->bindParam(":blogname", $subject);
    $priprema->bindParam(":bloginfo", $message);
    $priprema->bindParam(":idimg", $imageID);
    $priprema->bindParam(":idcat", $catid);
    $priprema->bindParam(":iduser", $userid);
    return $priprema;
}
function delete_Blog($ID){
    global $conn;
    $priprema = $conn->prepare("DELETE FROM blogs WHERE id =:ID");
    $priprema->bindParam(":ID", $ID);
    return $priprema;
}
function getBlogsbyPagination($limit,$offset){
    global $conn;
    $rez = $conn->prepare("SELECT 
    b.id as bID,
    b.name as blog_name,
    b.info,b.date,
    c.name as kat,
    s.url,s.alt,
    u.name as username
    FROM blogs b 
    inner join categories c on b.id_category=c.id 
    inner join images s on b.id_img=s.id 
    inner join users u on b.id_user=u.id
    ORDER BY bID
    LIMIT $limit 
    OFFSET $offset");
    $rez->execute();
    $r = $rez->fetchAll();
   return $r;

}
function getPosts($limit){
    global $conn;
    $rez = $conn->prepare("SELECT 
     p.id as post_ID,
     p.name as post_name,
     p.info,p.date,
     c.name as kat,
     s.url,s.alt,
     u.name as username
    FROM posts p 
    inner join categories c on p.id_category=c.id 
    inner join images s on p.id_img=s.id 
    inner join users u on p.id_user=u.id
    ORDER BY post_ID
    LIMIT $limit 
    ");
    $rez->execute();
    $r = $rez->fetchAll();
   return $r;
}
function getPostsbyPagination($limit,$offset){
        global $conn;
        $rez = $conn->prepare("SELECT 
         p.id as post_ID,
         p.name as post_name,
         p.info,p.date,
         c.name as kat,
         s.url,s.alt,
         u.name as username
        FROM posts p 
        inner join categories c on p.id_category=c.id 
        inner join images s on p.id_img=s.id 
        inner join users u on p.id_user=u.id
        ORDER BY post_ID
        LIMIT $limit 
        OFFSET $offset
        ");
        $rez->execute();
        $r = $rez->fetchAll();
       return $r;

}
function sortBlogsbyCat($limit,$offset,$category){
    global $conn;
    $rez = $conn->prepare("SELECT 
	b.id as bID,
    b.name as blog_name,
    b.info,b.date,
    c.name as kat,
    i.url,i.alt,
    u.name as username
FROM blogs b 
join categories c on b.id_category=c.id
join images i on b.id_img=i.id
join users u on b.id_user=u.id
where c.name ='$category'
ORDER by b.id
limit $limit
offset $offset");
    $rez->execute();
    $r = $rez->fetchAll();
   return $r;
}
function insert_Comment($userID,$blogID,$com){
    global $conn;
    $priprema = $conn->prepare("INSERT INTO 
    comments (id,id_user,id_blogs,comment)
     VALUES(NULL,:userid,:bid,:com)");
    $priprema->bindParam(":userid", $userID);
    $priprema->bindParam(":bid", $blogID);
    $priprema->bindParam(":com", $com);
    return $priprema;
}
