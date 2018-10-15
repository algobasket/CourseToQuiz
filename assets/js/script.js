$(document).ready(function(){
    $('.chapterDelete').click(function(){
       $('.chapterDeletePop').modal('show');
       $('.modalDeleteLink').attr('href',$(this).data('delete'));
    });
});
