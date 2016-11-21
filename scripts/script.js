/* Pause carousels */
$(document).ready(function() {
    $('.carousel').carousel({
        pause: true,
        interval: false
    });
});

/* Delay popups images loading */
function loadImages() {
    var imgs = document.getElementsByTagName('img');
    for (var i = 0; i < imgs.length; i++) {
        if (imgs[i].getAttribute('data-src')) {
            imgs[i].setAttribute('src', imgs[i].getAttribute('data-src'));
        }
    }
}
 
if (window.addEventListener) { window.addEventListener("load", loadImages, false); }
else if (window.attachEvent) { window.attachEvent("onload", loadImages); }


/* Menu*/

var Menu = $("#menu-items-container"),
    // All list items
    menuItems = Menu.find("a");
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

$(window).scroll(function(){
   // Get container scroll position
   var fromTop = $(this).scrollTop()+200;

   // Get id of current scroll item
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   // Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
   // Set/remove active class
   menuItems
     .parent().removeClass("active_link")
     .end().filter("[href='#"+id+"']").parent().addClass("active_link");
})



/* Lazy Loader */
$("img.lazy").show().lazyload();




/* Smooth scroll */
$(document).ready(function() {
    $('.js-scrollTo').on('click', function() { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        var speed = 750; // Durée de l'animation (en ms)
        $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
        return false;
    });
});


/* Tri du portfolio par theme */
var classname = document.getElementsByClassName("tributton");
var triportfolio = (function() {

    var alllist = document.getElementsByClassName("realbox");
    var attribute = this.getAttribute("data-filter");
    var attributeelements = document.getElementsByClassName(attribute);

    for (var i = 0; i < classname.length; i++) {
        $(classname[i]).removeClass("selectedlist");
    }

    $(this).addClass("selectedlist");
    for (var i = 0; i < alllist.length; i++ ) {
        $(alllist[i]).addClass('invisibleprojet')
        $(alllist[i]).removeClass('visibleprojet');
    }
    $(attribute).removeClass('invisibleprojet');
    $(attribute).addClass('visibleprojet');


});

for (var i = 0; i < classname.length; i++) {
    classname[i].addEventListener('click', triportfolio, false);
}

/* Popup */

/* Ouverture */

var watchclassname = document.getElementsByClassName("realmore");

var ouverturepopup = (function() {
    var dataprojet = this.getAttribute("data-projet");
    var popups = document.getElementsByClassName("popup");
    for (var i = 0; i < popups.length; i++) {
        var dataopenprojet = popups[i].getAttribute("data-open-projet");
        if (dataopenprojet == dataprojet){
            $(popups[i]).css("display" , "block");
           // if(window.innerWidth <= 767) {
            //    var hauteurpopup = (popups[i].clientHeight) / 3;
            //    $(popups[i]).children(".row").children(".popuptext").css("height", hauteurpopup);
            //}
        }
    }
    $('#allpage').addClass('blurred');
    $("body").addClass("modal-open");
});

for (var k = 0; k < watchclassname.length; k++) {
    watchclassname[k].addEventListener('click', ouverturepopup, false);
}

/* Fermeture */

function closepopup(thispopup) {
    $(thispopup).parent().css("display" , "none");
    $('#allpage').removeClass('blurred');
    $("body").removeClass("modal-open");

}

/* Ajax Formulaire */

$(function(){
    $("#contactform").submit(function(event){
        var prenom     = $("#inputprenom").val();
        var nom        = $("#inputnom").val();
        var email      = $("#inputmail").val();
        var tel      = $("#inputtel").val();
        var sujet      = $("#inputsujet").val();
        var message    = $("#inputmessage").val();
        var dataString = prenom + nom + email + tel + sujet + message;
        var msg_all    = "Merci de remplir tous les champs";
        var msg_alert  = "Merci de remplir ce champ";

        if (dataString  == "") {
            $("#msg_all").html(msg_all);
        } else if (prenom == "") {
            $("#msg_prenom").html(msg_alert);
        } else if (nom == "") {
            $("#msg_nom").html(msg_alert);
        } else if (email == "") {
            $("#msg_email").html(msg_alert);
        } else if (tel == "") {
            $("#msg_tel").html(msg_alert);
        }else if (sujet == "") {
            $("#msg_sujet").html(msg_alert);
        } else if (message == "") {
            $("#msg_message").html(msg_alert);
        } else {
            $.ajax({
                type : "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success : function() {
                    $("#msg_all").html("Votre message a bien été envoyé !");
                    $("#inputprenom").prop('readonly', true);
                    $("#inputnom").prop('readonly', true);
                    $("#inputemail").prop('readonly', true);
                    $("#inputtel").prop('readonly', true);
                    $("#inputsujet").prop('readonly', true);
                    $("#inputmessage").prop('readonly', true);
                    $("#buttonenvoi").prop('disabled', true);
                    $("#reinit").prop('disabled', true);


                },
                error: function() {
                    $("#contactform").html("<p id='formsent'>Erreur d'appel, le formulaire ne peut pas fonctionner</p>");
                }
            });
        }

        return false;
    });
});

/* Particles 
particlesJS.load('home-slide-content', 'scripts/particles.json', function() {
    console.log('particles.js loaded - callback');
});

*/