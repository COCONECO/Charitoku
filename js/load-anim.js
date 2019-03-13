//loding animation

/*********************************************
プログレスバー
スキップボタン
コンテンツ表示非表示
*********************************************/

$(function() {
  var hload = $(window).height();
 
  $('#wrap').css('opacity','0');
  $('#loaderBg').height(hload).css('display','block');
});

/*********************************************
プログレスバーはじめ
*********************************************/
var count = 0;
var trigger = 0;
var countup = function(){
  if(count > 99 ){　
    clearTimeout(id);　//idをclearTimeoutで指定している
  }else{
  console.log(count++);
  var id = setTimeout(countup, 40);
  $('.counter').css("opacity" , '1');//jquery
  $('.counter').text(count + '%');//jquery

  if(trigger < 1 ){
  $(window).load(function(){//ロードが先に終わった場合実行
    console.log(trigger = 1);
    clearTimeout(id);　
    var id = setTimeout(countup, 15);
      $('.counter').css("opacity" + '1');//jquery
      $('.counter').text(count + '%');//jquery
        setTimeout('animstart()',1000);
        setTimeout('showSkipButton()',0);
    });}
  }
}
countup();

/*********************************************
プログレスバーおわり
*********************************************/
/*********************************************
スキップボタン
*********************************************/

/**
 * スキップボタンの表示
 */
var showSkipButton = showSkipButton = function showSkipButton() {
  var skip_button = document.getElementById('skipButton');
  skip_button.setAttribute('data-state', 'true');

  /* click ---------------------------------------------------------------- */
  skip_button.addEventListener('click', function (e) {
    e.target.setAttribute('data-state', 'false');
    skipAnimation();
  });

  setTimeout(function () {
    skip_button.setAttribute('data-state', 'false');
  }, 9000);
};

/**
 * アニメーションをスキップ
 */

var skipAnimation = skipAnimation = function skipAnimation() {
  var app = document.getElementById('app');
  app.setAttribute('data-state', 'false');

  var wrap = document.getElementById('wrap');
  wrap.setAttribute('data-state', 'true');

  $(function(){
    setTimeout('stopanim()',1000);/*スキップ後のアニメーション停止*/
  });
};

function stopanim(){
  var element = document.getElementsByClassName('loadStandby');
  $('#page').css('z-index', '-1');
  $('#wrap').css('z-index', '1');
  for(var i = 0; i < element.length; i++){
      element[i].classList.remove('loadStandby');
      element[i].setAttribute('data-state', 'false');
  }
}
/*********************************************
スキップボタンおわり
*********************************************/
/*********************************************
コンテンツ表示非表示はじめ
*********************************************/

$(window).load(function () { //全ての読み込みが完了したら実行
    $('#page').delay(11000).fadeOut(800);
    $('.app').delay(10800).fadeOut(300);
    $('#wrap').css('opacity', '1');
});
 
//強制的にロード画面を非表示
$(function(){
  setTimeout('stopload()',3000);
  setTimeout('animstart()',4000);
  setTimeout('showSkipButton()',3000);
});
 
function stopload(){
  $('#page').delay(11000).fadeOut(800);
  $('.app').delay(10800).fadeOut(300);
  $('#wrap').css('opacity','1');
}

function animstart(){
  var element = document.getElementsByClassName('loadStandby');
  for(var i = 0; i < element.length; i++){
      // element[i].classList.add('loadComplete');
      element[i].setAttribute('data-state', 'loadComplete');
  }
}

/*********************************************
コンテンツ表示非表示おわり
*********************************************/