$(document).ready(function() {
     Form_reg();
// alert('heloo');
    function Form_reg(){
      $('#register_btn').on('click',function(){
        let username = $('#name');
        let email = $('#email');
        let address = $('#address');
        let password = $('#password');
        let bdate = $('#bdate');

      let usernameRe=/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;//Tonmawwq{12 karaktera}
      let emailRe = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;//test@gmail.edu.com
      let addressRe=/^\w+(\s\w+)*$/;//123 Nasticeva Mike
      let passRe=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{10,}$/;//min 8 karaktera, i jedan broj i jedno slovo:
      
      let podaciForme = [];
        var spremno = true;
          function Proveriparametar(parametar,regex,primer) {
            if(parametar.val() == ''){ 
              spremno = false;
              parametar.val("");
              parametar.next().text('The field can not be empty.');
          }
           else if(!regex.test( parametar.val() ) ) {
            spremno = false;
            parametar.val("");
            parametar.next().text('Eg:'+primer);
          }
           else{
             parametar.next().text('');
              podaciForme.push(parametar.val());
              }
          }//proveri
          Proveriparametar(username,usernameRe,"Nathaniel Baker");
          Proveriparametar(email,emailRe,"test@gmail.edu.com");
          Proveriparametar(address,addressRe,"123 Nasticeva Mike");
          Proveriparametar(password,passRe,"thisismyp9(min 10).");
          //date 
          var byear = bdate.val().substr(0,4);
          var cdate = new Date().getFullYear();
          if(bdate.val() == ''){ 
            spremno = false;
            bdate.val("");
            bdate.next().text('The field can not be empty.');
         }
          else if(byear > cdate){
            spremno = false;
            bdate.val("");
            bdate.next().text('Year is invalid.');
          }else{
            bdate.next().text('');
            podaciForme.push(bdate.val());
          }
            if(spremno){
             let ime = podaciForme[0];
             let mail = podaciForme[1];
             let adresa = podaciForme[2];
             let sifra = podaciForme[3];
             let bdate = podaciForme[4];
            $.ajax({
                url : "models/reg_insert.php",
                method : "POST",
                dataType : "json",
                data : {
                    name:ime,
                    email:mail,
                    address:adresa,
                    password:sifra,
                    bdate:bdate,
                    button : true
                },
                success: function(result){
                 alert(`${result.message}`);
                 if (result.message) {
                 // location.reload();
                  window.location.replace("index.php?page=blogger");
                 }
              },
              error: function(xhr){
                console.log(xhr);
                if(xhr.status == 401){
                  $("#message_log").html(`
                  <p class="alert alert-warning">
                  ${xhr.status} You'r email or password informations are not correct.</p>`);
              }
              if(xhr.status == 500){
                $("#message_log").html(`
                <p class="alert alert-warning">
               There was an error with database computing.</p>`);
            }
              }
                });
            }
      });
      
      }//forma
      Form_log();
     // alert('hello');
    function Form_log(){
       $('#login_btn').on('click',function(){
        let email = $('#email');
        let password = $('#password');
      let emailRe = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;//test@gmail.edu.com
      let passRe=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{10,}$/;//min 10 karaktera, i jedan broj i jedno slovo:
      let podaciForme = [];
        var spremno = true;
          function Proveriparametar(parametar,regex,primer) {
            if(parametar.val() == ''){ 
              spremno = false;
              parametar.val("");
              parametar.next().text('The field can not be empty.');
          }
           else if(!regex.test( parametar.val() ) ) {
            spremno = false;
            parametar.val("");
            parametar.next().text('Eg:'+primer);
          }
           else{
             parametar.next().text('');
              podaciForme.push(parametar.val());
              }
          }//proveri
          Proveriparametar(email,emailRe,"test@gmail.edu.com");
          Proveriparametar(password,passRe,"thisismyp9(min 10).");
            if(spremno){
             
             let mail = podaciForme[0];
             let sifra = podaciForme[1];
            $.ajax({
                url : "models/log_check.php",
                method : "post",
                dataType : "json",
                data : {
                  email:mail,
                  password:sifra,
                  button:true
                },
                success: function(data){
                 alert(`${data.message}`);
                 if (data.message) {
                  location.reload();
                 }
              },
              error: function(xhr,error){
                console.log(xhr);
                  if(xhr.status == 401){
                      $("#message_log").html(`
                      <p class="alert alert-warning">
                      ${xhr.status} You'r email or password informations are not correct.</p>`);
                  }
                  if(xhr.status == 500){
                    $("#message_log").html(`
                    <p class="alert alert-warning">
                   There was an error with database computing.</p>`);
                }
              }
                });
            }
          });
        }
  ToggleUserInfo();
  function ToggleUserInfo(){
          $("#user_info").on('click',function(e) {
            e.preventDefault();
            $("#more_user_info").toggle('1500');
          });
        }
  BacktotopButton();
  function BacktotopButton(){
        var btn = $('#backtotop');
    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });
    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });


  }  
  contactPoruka();
    function contactPoruka(){
      $('#button_contact').on('click',function(){
      let name = $('#name');
      let email = $('#email');
      let subject = $('#subject');
      let message = $('#message');
    let usernameRe=/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;//Nathaniel Baker{12 karaktera}
    let emailRe = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;//test@gmail.edu.com
        var spremno = true;
            function Proveriparametar(parametar,regex,primer) {
              if(parametar.val() == '')
              { 
                spremno = false;
                parametar.val("");
                parametar.next().text('The field can not be empty.');
            }
            else if(!regex.test( parametar.val() ) ) {
              spremno = false;

              parametar.val("");
              parametar.next().text('Eg:'+primer);
            }
            else{
              parametar.next().text('');
                }
            }
        Proveriparametar(name,usernameRe,"Nathaniel Baker");
        Proveriparametar(subject,usernameRe,"Nathaniel Writing Code");
        Proveriparametar(email,emailRe,"test@gmail.edu.com");
        if(message.val() == '')
        { 
          spremno = false;
          message.val("");
          message.next().text('The field can not be empty.');
         }
         else if((message.val().length<3)){
          spremno = false;
          message.val("");
          message.next().text('Message length must be bigger the 3.');
           }
         else{
          message.next().text('');
           }
          if(spremno){
          $.ajax({
              url : "models/insert_message.php",
              method : "post",
              dataType : "json",
              data : {
                name:name.val(),
                email:email.val(),
                subject:subject.val(),
                message:message.val(),
                button:true
              }
              ,success: function(result){
                console.log(result);
               alert(`${result.message}`);
            },
            error: function(xhr){
                console.error(xhr);
                if(xhr.status == 500){
                  $("#contact-message").html(`
                  <p class="alert alert-warning">
                  Error on server processing.
                  </p>`);
                }
            }
              });

             // location.reload();
          }
    });
     
    }//contact
    comments_likes();
    function comments_likes(){
      $('.com-btn').on('click',function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('.cblock'+id).toggle('1500');
      })
    }
    
 });//ready