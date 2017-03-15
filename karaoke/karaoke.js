var complete = "iese din scara cer ploios trancan pe el adidasi noi ginitor stanga dreapta gluga neagra strada lui respira adinc puls accelerat si se gandeste ca totul e posibil daca vrea si vrea sa faca bani chitit sa nu dea inapoi plus pus pe fapte mari se temea de facultate ca oricum era primar nimic in rest oare care baiat din SCM calcase pe un drum gresit si se simtea in pierdere mergea sa ridice marfa lua in calcul teapa pentru orice eventualitate pregatit de japca iata ca se apropie de rendez vous vede masina lor se urca-n spate nu scoate un cuvant aveau cel mai bun hit deci slabe sanse sa-i para rau planta acid proba de mostra pipa pacii blana rau timpu sa negociezi un pret discutii apoi stabilesc la 15 ca stiau ca e baiat destept si s-ar fi descurcat cu 4 kile pe 50 de zile i-au zis vezi ca daca te futi cu noi esti mort copile deci pan' la scadente sa ne cauti tu pe noi caz contrar stim unde stau ai tai si dam peste ei si nu uita ne contactezi la date in aceeasi metoda si daca se intampla ceva de rau tu nu suflii o vorba ai inteles am inteles ia tine plasa ma ai grija ce faci baiatu da din cap si pleaca acasa pune pachetu pe birou deja vexat ca ii lipseau 500 pe calculator zicea asta e tre' sa ma misc acum daca vreau sa castig sunt obligat sa risc dar suflu in iaurt oricum Primele zile conexiuni vizite pe la oamenii lui lasa la fiecare cateva sute din bagajul lui paralel dadea lejer cateva zeci dupa doua saptamani panicat ca le da prea incet A trecut o luna a plecat la colectat patrula prin cartiere avea bani de luat acum era presat avea smecheri de cautat baietasi s-au dat la fund si era paranoizat braaa Continua sa numere zilele punea bani pe bani intre timp cateva complicatii s-au solutionat era leapsa pe coco el cu cativa jucatori mici lupta pentru clientela noua toti jmenarii dornici sa produca si s-o duca bine dar fiecare trage pentru el si face ca tine doar daca-i convine unii cautau stabilitate si-au lucrat corect care a cooperat a fost cooptat de smen si la un moment dat s-a implinit o luna jumate omu nostru cu gheata pe el 600 milioane da semnalu pac intalnire de urgenta doar ca de data asta el avea alte pretentii ba va scap de multa mi-o lasati mai ieftin de-atata astia s-au vazut cu banii-n mana si au cantarit situatia nu stiau nici ei ce sa raspunda da au jucat la sigur si au acceptat ca sa nu se-nfunde asta era deja in avantaj in valiza con la 10 alta marfa mai multi bani ca astia nu riscau nimic de fapt tocmai s-au intors din giurgiu cu kilele crescute la bulgari si tot asa timpu trecea lucruri se-ntamplau castiga din ce in ce mai mult asta vroia de fapt cativa interlopi acum sunt la el in brigada si din cand in cand le paseaza verde-n schimb la alba stia cum sa mute stia cum sa opereze sa se fereasca si sa conecteze sutele se concentra mereu pe numere au inceput sa vina sumele urmatoru pas sa stearga toate urmele ca vechii lui tovarasi nu mai stiu nimic de el au senzatia ca a luat-o razna si e plin de el nici nu-si imagineaza-n ce afaceri e bagat asta e situatia si tre sa ramana asa cate-o-data nu-i vina sa creada ca a reusit visul lui de a fi un gangster s-a implinit acum are plantatia lui nu se murdareste pe maini la la gratar cu antidrog o data la 2 saptamani aproape nimeni nu stie ce face de asta bagabontii sunt la modu mars ma cum o arde asta s-a ridicat cica-i baiat adevarat am auzit ca face bani blat si si-a luat septar si stii ceva e cam asa e chiar asa"
var str = "iese din scara cer ploios"
var words = complete.split(" ");
var number = words.length;

for(i = 0; i < number; i ++ ) {
    $('.animated-wrap').animate({ }, "linear", function() {
        $(this).append("<p class=\"wordbyword\">" + words[i] +  "</p>");
    });
}

// setInterval(function() {
//   var elem = document.getElementById('out');
//   elem.scrollTop = elem.scrollHeight;
// }, 1);

var myVar = setInterval(
    function() {
        var elem = document.getElementById('out');
        elem.scrollTop = elem.scrollHeight;
    }, 300);





$(function(){
    var lastScrollTop = 0, delta = 5;
    $(window).scroll(function(event){
        var st = $(this).scrollTop();

        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        if (st > lastScrollTop){
            // downscroll code
            alert("scroll down");
        } else {
            // upscroll code
            alert("scroll up");
        }
        lastScrollTop = st;
    });
});


// var vid = document.getElementById("visulLui");

// function setSmallVolume() {
//     vid.volume = 0.1;
// }

// setSmallVolume();


// window.onkeypress = function(event) {
//    if (event.keyCode == 32 &&  !vid.paused) {
//      vid.pause();
//    }
//   else {
//     vid.play();
//   }
// }

