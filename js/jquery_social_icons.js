function showHover(img, social) {
    if (String(social) === "Instagram") {
        img.src = 'images/icon/in_dark.png';
    }
    else if (String(social) === "Facebook") {
        img.src = 'images/icon/fb_dark.png';
    }
    else if (String(social) === "Twitter") {
        img.src = 'images/icon/tw_dark.png';
    }
    else if (String(social) === "WhatsApp") {
        img.src = 'images/icon/wa_dark.png';
    }

}
function showNormal(img, social) {
    if (String(social) === "Instagram") {
        img.src = 'images/icon/in_color.png';
    }
    else if (String(social) === "Facebook") {
        img.src = 'images/icon/fb_color.png';
    }
    else if (String(social) === "Twitter") {
        img.src = 'images/icon/tw_color.png';
    }
    else if (String(social) === "WhatsApp") {
        img.src = 'images/icon/wa_color.png';
    }
}



$(document).ready(function () {
    $('#icon_in').mouseover(function () {
        showHover(this, "Instagram");
    }).mouseout(function () {
        showNormal(this, "Instagram");
    });

    $('#icon_fb').mouseover(function () {
        showHover(this, "Facebook");
    }).mouseout(function () {
        showNormal(this, "Facebook");
    });

    $('#icon_tw').mouseover(function () {
        showHover(this, "Twitter");
    }).mouseout(function () {
        showNormal(this, "Twitter");
    });

    $('#icon_wa').mouseover(function () {
        showHover(this, "WhatsApp");
    }).mouseout(function () {
        showNormal(this, "WhatsApp");
    });

});



function showHover2(img, social) {
    if (String(social) === "Instagram") {
        img.src = 'images/icon/in_color.png';
    }
    else if (String(social) === "Facebook") {
        img.src = 'images/icon/fb_color.png';
    }
    else if (String(social) === "Twitter") {
        img.src = 'images/icon/tw_color.png';
    }
    else if (String(social) === "WhatsApp") {
        img.src = 'images/icon/wa_color.png';
    }

}
function showNormal2(img, social) {
    if (String(social) === "Instagram") {
        img.src = 'images/icon/in_light.png';
    }
    else if (String(social) === "Facebook") {
        img.src = 'images/icon/fb_light.png';
    }
    else if (String(social) === "Twitter") {
        img.src = 'images/icon/tw_light.png';
    }
    else if (String(social) === "WhatsApp") {
        img.src = 'images/icon/wa_light.png';
    }
}



$(document).ready(function () {
    $('#icon_in2').mouseover(function () {
        showHover2(this, "Instagram");
    }).mouseout(function () {
        showNormal2(this, "Instagram");
    });

    $('#icon_fb2').mouseover(function () {
        showHover2(this, "Facebook");
    }).mouseout(function () {
        showNormal2(this, "Facebook");
    });

    $('#icon_tw2').mouseover(function () {
        showHover2(this, "Twitter");
    }).mouseout(function () {
        showNormal2(this, "Twitter");
    });

    $('#icon_wa2').mouseover(function () {
        showHover2(this, "WhatsApp");
    }).mouseout(function () {
        showNormal2(this, "WhatsApp");
    });

});