//loding animation
$(function() {
  var hload = $(window).height();
 
  $('#wrap').css('opacity','0');
  $('#loader-bg ,#loader').height(hload).css('display','block');
});

/*********************************************
プログレスバーはじめ
*********************************************/
var count = 0;
var countup = function(){
  console.log(count++);
  var id = setTimeout(countup, 30);
  $('.progress-bar:nth-child(1)').css('animation',  "full-moon-1 " +  (15 - (count * 0.1) ) + 's forwards');//jquery
  $('.progress-bar:nth-child(2)').css('animation',  "full-moon-2 " +  (15 - (count * 0.1) ) + 's forwards');//jquery
  $('.counter').text(count + '%');//jquery
  if(count > 99){　
    clearTimeout(id);　//idをclearTimeoutで指定している
  }
  // $(window).load(function () {//ロードが先に終わった場合実行
  //     $('.progress-bar:nth-child(1)').css('animation',  "full-moon-1 " + 4 + 's forwards');
  //     $('.progress-bar:nth-child(2)').css('animation',  "full-moon-2 " + 4 + 's forwards');
  //   clearTimeout(id);　//idをclearTimeoutで指定している
  // });
}
countup();

function stopload(){
  $('#wrap').css('width',count);
}
/*********************************************
プログレスバーおわり
*********************************************/

// $(window).load(function () { //全ての読み込みが完了したら実行
//   $('#page').delay(900).fadeOut(800);
//   $('.app').delay(600).fadeOut(300);
//   $('#wrap').css('display', 'block');
//   $('#page').css('position','absolute');
// });
 
//10秒たったら強制的にロード画面を非表示
$(function(){
  setTimeout('stopload()',14000);
});
 
function stopload(){

  $('#page').delay(900).fadeOut(800);
  $('.app').delay(600).fadeOut(300);
  $('#wrap').css('opacity','1');
  $('#page').css('position','absolute');
}







