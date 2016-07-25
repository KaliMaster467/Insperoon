$(document).ready(function(){
  //mainHeader(WindowH());

  $(".navbar").hover(function(){
      $(this).animate({height:"600px"},200);
      $(".Login-fr").show();

  },function(){
      $(this).animate({height:"55px"},200);
      $(".Login-fr").hide();
  });
  $(".start-prompt").hover(function(){
      $(this).animate({height:"600px"},200);
      $(".Register-fr").show();
  },function(){
      $(this).animate({height:"55px"},200);
      $(".Register-fr").hide();
  });
});
