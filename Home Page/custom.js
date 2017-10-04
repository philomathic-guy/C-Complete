
 // Calling the function
$(function() {
    $('.Docs').click(function() {
        toggleNavigation1();
    });
    $('.Books').click(function() {
        toggleNavigation2();
    });
    $('.Compiler').click(function() {
        toggleNavigation3();
    });
    $('.Quiz').click(function() {
        toggleNavigation4();
    });
});


// The toggleNav function itself
function toggleNavigation1() {
    if ($('#container').hasClass('display-nav1')) {
        // Close Nav
        $('#container').removeClass('display-nav1');
    } else {
        // Open Nav
        $('#container').removeClass('display-nav3');
        $('#container').removeClass('display-nav2');
        $('#container').removeClass('display-nav4');
        $('#container').addClass('display-nav1');

    }
}

function toggleNavigation2() {
    if ($('#container').hasClass('display-nav2')) {
        // Close Nav
        $('#container').removeClass('display-nav2');
    } else {
        // Open Nav
        $('#container').removeClass('display-nav1');
        $('#container').removeClass('display-nav3');
        $('#container').removeClass('display-nav4');
        $('#container').addClass('display-nav2');
    }
}

function toggleNavigation3() {
    if ($('#container').hasClass('display-nav3')) {
        // Close Nav
        $('#container').removeClass('display-nav3');
    } else {
        // Open Nav
        $('#container').removeClass('display-nav1');
        $('#container').removeClass('display-nav2');
        $('#container').removeClass('display-nav4');
        $('#container').addClass('display-nav3');
    }
}

function toggleNavigation4() {
    if ($('#container').hasClass('display-nav4')) {
        // Close Nav
        $('#container').removeClass('display-nav4');
    } else {
        // Open Nav
        $('#container').removeClass('display-nav1');
        $('#container').removeClass('display-nav2');
        $('#container').removeClass('display-nav3');
        $('#container').addClass('display-nav4');
    }
}