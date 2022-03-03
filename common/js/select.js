$(document).ready(function () {

    $('.select .arrow').toggle(function () {  //�⑤�由ъ궗�댄듃 �대┃
        $('.select .aList').slideDown('slow');  //���� �대┃ �닿린
    }, function () {
        $('.select .aList').slideUp('fast');  //吏앹닔 �대┃ �リ린
    });

    //tab�� 泥섎━
    $('.select .arrow').on('focus', function () { //focus�� a�쒓렇留� 諛쏆쓣 �� �덉쓬
        $(this).css('color','#fff');
        $('.select .aList').slideUp('slow');
    });
    $('.select .arrow').on('blur', function () { 
        $(this).css('color','#ccc');
    });
    $('.select .aList a').on('focus', function () { 
        $(this).css('color','#fff');
    });
    $('.select .aList a').on('blur', function () { 
        $(this).css('color','#ccc');
    });


    $('.select .aList li:last a').on('blur', function () { //blur <=> focus
        $('.select .aList').slideUp('fast');
    });
});