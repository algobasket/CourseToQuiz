$(document).ready(function(){
    $('.chapterDelete').click(function(){
       $('.chapterDeletePop').modal('show');
       $('.modalDeleteLink').attr('href',$(this).data('delete'));
    });
    $('.no_of_questions').change(function(){
      $('#selectedQuestionCount').html($(this).val());
    });

    $('.changePassword').click(function(){
       if($('#new_password').val() == "" || $('#new_password').val() == null){
          //$('#new_password').css({"background-color:#e83e8c"});
          alert("Empty Password Field");
       }else{
         $.post('../welcome/passwordChangeAjax',{ new_password : $('#new_password').val() },function(data,status){
           $('#passwordChangeAlert').html(data).show();
         });
       }
    });

    $('#checkUsername').click(function(){
        $.post('../welcome/isUsernameAvailable',{ username : $('.usernameProfile') },function(data,status){
           $('#checkUsernameAlert').html(data).show();
        });
    });

    $('#checkEmail').click(function(){
        $.post('../welcome/isEmailAvailable',{ email : $('.emailProfile') },function(data,status){
           $('#checkEmailAlert').html(data).show();
        });
    });






});
