function fadeInmsr(a, c) {
if (a)
if (a.style.opacity = 0, a.style.filter = "alpha(opacity=0)", a.style.display = "inline-block", a.style.visibility = "visible", c) var b = 0,
d = setInterval(function () {
b += 50 / c;
1 <= b && (clearInterval(d), b = 1);
a.style.opacity = b;
a.style.filter = "alpha(opacity=" + 100 * b + ")"
}, 50);
else a.style.opacity = 1, a.style.filter = "alpha(opacity=1)"
}
function isWindowtsbc(a) {
return null != a && a === a.window
}

function getWindowtsbc(a) {
return isWindowtsbc(a) ? a : 9 === a.nodeType && a.defaultView
}

function offsettsbc(a) {
var c = {
top: 0,
left: 0
},
b = a && a.ownerDocument;
var d = b.documentElement;
"undefined" !== typeof a.getBoundingClientRect && (c = a.getBoundingClientRect());
a = getWindowtsbc(b);
return {
top: c.top + a.pageYOffset - d.clientTop,
left: c.left + a.pageXOffset - d.clientLeft
}
}

function fadeOutmsr(a, c) {
if (a)
if (c) var b = 1,
d = setInterval(function () {
b -= 50 / c;
0 >= b && (clearInterval(d), b = 0, a.style.display = "none", a.style.visibility = "hidden");
a.style.opacity = b;
a.style.filter = "alpha(opacity=" + 100 * b + ")"
}, 50);
else a.style.opacity = 0, a.style.filter = "alpha(opacity=0)", a.style.display = "none", a.style.visibility = "hidden"
}
document.readyState && (document.onreadystatechange = function () {
if ("loaded" == document.readyState || "complete" == document.readyState) {
var div_tsbc_software = document.getElementById("div_tsbc_software"),
cid = div_tsbc_software.getAttribute("data-cid");
"demo" == cid && (cid = "7");

var view = "",
drend = new Date,
nrend = drend.getTime(),
local = div_tsbc_software.getAttribute("data-local"),
bgcolor = div_tsbc_software.getAttribute("data-background"),
layout = div_tsbc_software.getAttribute("data-layout"),
width = div_tsbc_software.getAttribute("data-width") + "px";
if (null == div_tsbc_software.getAttribute("data-width") || void 0 == div_tsbc_software.getAttribute("data-width")) width = "px";
"px" == width && (width = "100%");
var tsbc_script_value = "<style>#div_tsbc_software{width:100%}.Timeslote_div" + nrend + "{width:" + width + ";position:relative;background:#" + bgcolor + ';text-align:center;display:inline-block}#div_timeslot_size{min-height:50px;min-width:270px}#fountainTextG{margin:0 auto;background:#000;text-align:center;display:inline-block}.fountainTextG{color:#000;font-size:24px;text-decoration:none;;font-style:normal;float:left;animation-name:bounce_fountainTextG;-o-animation-name:bounce_fountainTextG;-ms-animation-name:bounce_fountainTextG;-webkit-animation-name:bounce_fountainTextG;-moz-animation-name:bounce_fountainTextG;animation-duration:2.09s;-o-animation-duration:2.09s;-ms-animation-duration:2.09s;-webkit-animation-duration:2.09s;-moz-animation-duration:2.09s;animation-iteration-count:infinite;-o-animation-iteration-count:infinite;-ms-animation-iteration-count:infinite;-webkit-animation-iteration-count:infinite;-moz-animation-iteration-count:infinite;animation-direction:normal;-o-animation-direction:normal;-ms-animation-direction:normal;-webkit-animation-direction:normal;-moz-animation-direction:normal;transform:scale(.5);-o-transform:scale(.5);-ms-transform:scale(.5);-webkit-transform:scale(.5);-moz-transform:scale(.5)}#fountainTextG_1{animation-delay:.75s;-o-animation-delay:.75s;-ms-animation-delay:.75s;-webkit-animation-delay:.75s;-moz-animation-delay:.75s}#fountainTextG_2{animation-delay:.9s;-o-animation-delay:.9s;-ms-animation-delay:.9s;-webkit-animation-delay:.9s;-moz-animation-delay:.9s}#fountainTextG_3{animation-delay:1.05s;-o-animation-delay:1.05s;-ms-animation-delay:1.05s;-webkit-animation-delay:1.05s;-moz-animation-delay:1.05s}#fountainTextG_4{animation-delay:1.2s;-o-animation-delay:1.2s;-ms-animation-delay:1.2s;-webkit-animation-delay:1.2s;-moz-animation-delay:1.2s}#fountainTextG_5{animation-delay:1.35s;-o-animation-delay:1.35s;-ms-animation-delay:1.35s;-webkit-animation-delay:1.35s;-moz-animation-delay:1.35s}#fountainTextG_6{animation-delay:1.5s;-o-animation-delay:1.5s;-ms-animation-delay:1.5s;-webkit-animation-delay:1.5s;-moz-animation-delay:1.5s}#fountainTextG_7{animation-delay:1.64s;-o-animation-delay:1.64s;-ms-animation-delay:1.64s;-webkit-animation-delay:1.64s;-moz-animation-delay:1.64s}@keyframes bounce_fountainTextG{0%{transform:scale(1);color:#000}100%{transform:scale(.5);color:#fff}}@-o-keyframes bounce_fountainTextG{0%{-o-transform:scale(1);color:#000}100%{-o-transform:scale(.5);color:#fff}}@-ms-keyframes bounce_fountainTextG{0%{-ms-transform:scale(1);color:#000}100%{-ms-transform:scale(.5);color:#fff}}@-webkit-keyframes bounce_fountainTextG{0%{-webkit-transform:scale(1);color:#000}100%{-webkit-transform:scale(.5);color:#fff}}@-moz-keyframes bounce_fountainTextG{0%{-moz-transform:scale(1);color:#000}100%{-moz-transform:scale(.5);color:#fff}}#divcal_size{display:block;min-width:270px}</style><div id=div_timeslot_size  class="Timeslote_div' + nrend + '" style=display:inline-block;position:relative ><div id="loadiniframe' + nrend + '" style="width:100%;height:min-height:50px;text-align:center;background:#000;display:inline-block;-moz-opacity:.5;opacity:.5;border-radius:0 0 4px 4px"><div id=fountainTextG><div id=fountainTextG_1 class=fountainTextG>L</div><div id=fountainTextG_2 class=fountainTextG>o</div><div id=fountainTextG_3 class=fountainTextG>a</div><div id=fountainTextG_4 class=fountainTextG>d</div><div id=fountainTextG_5 class=fountainTextG>i</div><div id=fountainTextG_6 class=fountainTextG>n</div><div id=fountainTextG_7 class=fountainTextG>g</div></div></div><iframe align=center frameborder=0 height=100% id="time_slot_iframe' + nrend + '" scrolling=no src="" style=display:none width=100%></iframe></div>';

div_tsbc_software.innerHTML = tsbc_script_value;
document.onreadystatechange = null;
var a = document.getElementById("time_slot_iframe" + nrend),
c = document.getElementById('loadiniframe' + nrend);




window.addEventListener("message", function (ret) {

if ("timeslot_loaded_finiched" === ret.data.slotproccess) {
console.log('display calendar');
fadeOutmsr(c, 1E3);
fadeInmsr(a, 2E3);
}

});
a.src = "https://myreservationsystem.com/embed/java_embedslot.php?cid=" + cid + "&view=auto&lng=" + local + "&layout=" + layout;
var b = document.getElementById("div_timeslot_size");		


window.addEventListener("message", function (a) {
if ("timeslot_size" === a.data.slotproccess) {
var c = parseInt(a.data.timslotcal)+3;
document.getElementById("div_timeslot_size").style.height = c + "px"
}
"calendar_div" === a.data.event_scroll && (a = offsettsbc(document.getElementById("div_timeslot_size")).top, window.scrollTo(0, a))
});
window.smoothScroMrbc = function (target, val) {
if (val) var vv = val - 10;
else var vv = 0;
var scrollContainer = target;
do {
if (scrollContainer = scrollContainer.parentNode, !scrollContainer) return;
scrollContainer.scrollTop += 1
} while (0 == scrollContainer.scrollTop);
var targetY = vv;
do {
if (target == scrollContainer) break;
targetY += target.offsetTop
} while (target = target.offsetParent);
(scrollMrbc = function (c, a, b, i) {
i++, i > 30 || (c.scrollTop = a + (b - a) / 30 * i, setTimeout(function () {
scrollMrbc(c, a, b, i)
}, 15))
})(scrollContainer, scrollContainer.scrollTop, targetY, 0)
}
window.addEventListener("message", function (event) {
"calendar_div" === event.data.event_scroll && (event.data.totop ? smoothScroMrbc(div_tsbc_software, event.data.totop) : smoothScroMrbc(div_tsbc_software))

});
}
});
