

var currentId = "colour-primary";
var currentColour = "primary";

var hue = 252;
var saturation = 80;
var lightness = 68;

var colours = {
  primary: "hsl(252,80%,60%)",
  accent: "hsl(160,80%,40%)",
  neutral: "hsl(0,0%,100%)"
};

// sensible default just in case jQuery doesn't kick in
// makes sure that the experience is still usable, and when $(window).width() returns
// then this variable is updated to the correct value
var windowWidth = 300;
// either 220px or 280px
var colourPickerWidth = 280;

$(document).ready(function() {

  // colour toggles are only to activate colour picker
  $(".colour").click(function(e) {

    // check if colour clicked on is active
    var isSelecting = $(this).hasClass("selecting");

    // always call this to make sure event handlers are reset
    // also removes "selecting' from all .colour instances
    hideColourPicker();

    // used to apply colours
    currentId = $(this)[0].id;
    currentColour = currentId.slice(7 - currentId.length);

    // positioning colour picker
    // only happens on clicking .colour as this is the only way to show the picker
    // this has to come before showColourPicker as the functions to initialise depend on the current position
    var pxFromTop = $(this).offset().top;
    $("#colour-picker").css("top", pxFromTop + 40);
    // check if right edge of colourPicker will go off the edge of the screen, and if so then reduce left by that amount
    var rightEdge = e.pageX + colourPickerWidth;
    var overflowWidth = rightEdge - windowWidth;
    if (overflowWidth > 0) {
      $("#colour-picker").css("left", e.pageX - overflowWidth);
    } else {
      $("#colour-picker").css("left", e.pageX);
    }

    // checks to make sure that it's not already showing
    // also need to account for clicking different tabs and transitioning cleanly
    if ( isSelecting === false ) {
      $(this).addClass("selecting");
      showColourPicker();
    }
    // no need for an else; hideColourPicker removed all instances of "selecting"
    // which effectively 'unselects' if isSelecting === true
  });

  // clicking copy icon copies output text to clipboard
  $("#colour-picker-output-copy").click(function() {

    // select text courtesy of https://stackoverflow.com/questions/985272/selecting-text-in-an-element-akin-to-highlighting-with-your-mouse
    var text = document.getElementById('colour-picker-output-text');
    var range = document.createRange();
    var selection = window.getSelection();

    range = document.createRange();
    range.selectNodeContents(text);
    selection.removeAllRanges();
    selection.addRange(range);

    try {
      // copy text courtesy of https://css-tricks.com/native-browser-copy-clipboard/
      // Now that we've selected the anchor text, execute the copy command
      document.execCommand('copy');
    } catch(err) {
      alert("Automatic copying isn't currently supported by your browser. You can still highlight the desired values and copy them manually.")
    }

    // Remove the selections - NOTE: Should use
    // removeRange(range) when it is supported
    window.getSelection().removeAllRanges();
  });

  $("#colour-picker-exit").click(function() {
    hideColourPicker();
  });

  $(document).click(function(event) {
    var clickedOnPicker = ($(event.target).closest("#colour-picker").length);
    var clickedOnColour = ($(event.target).closest(".colour").length)
    if (!(clickedOnPicker || clickedOnColour)) {
      hideColourPicker();
    }
  });

});

// updates output box with current colour values
function updateTextToCopy() {
  $("#colour-primary-text").text(colours.primary);
  $("#colour-accent-text").text(colours.accent);
  $("#colour-neutral-text").text(colours.neutral);
}

// generate colour picker gradient (hues)
$(document).ready(function() {
  var rectId = "colour-picker-rect-h";
  var gradientId = "gradient-h";
  var gradient = document.getElementById(gradientId)
  var rect = document.getElementById(rectId);

  for (var i = 0; i < 361; i++) {

    var hue = `stop-color: hsl(${i},100%,50%)`;
    var offset = (i/361*100) + "%";

    var stop = document.createElementNS("http://www.w3.org/2000/svg", 'stop');
    stop.setAttribute("offset", offset);
    stop.setAttribute("style", hue);

    gradient.appendChild(stop);
  }
});

function initColourPickerHs() {

  var svgOffset = $("#colour-picker-h-s").offset();
  var svgTop = svgOffset.top;
  var svgLeft = svgOffset.left;

  var startHeight = 200;
  var startWidth = 361;

  var actualHeight = $("#colour-picker-h-s").height();
  var actualWidth = $("#colour-picker-h-s").width();

  var scaleHeight = actualHeight / startHeight;
  var scaleWidth = actualWidth / startWidth;

  var selectorCircle = $("#colour-picker-selector-h-s");
  var colourPickerHs = $("#colour-picker-h-s");

  var mousedown = false;

  colourPickerHs.on("mousemove", function(e) {
    if (mousedown === false) {
      return;
    }
    updateColour(e);
  });

  colourPickerHs.on("mousedown", function(e) {
    mousedown = true;
    colourPickerHs.css("cursor", "pointer");
    updateColour(e);
  });

  $(document).on("mouseup", function() {
    mousedown = false;
    colourPickerHs.css("cursor", "initial");
  });

  function updateColour(e) {
    var newCx = (e.pageX - svgLeft)/scaleWidth;
    var newCy = (e.pageY - svgTop)/scaleHeight;
    selectorCircle.attr("cx", newCx).attr("cy", newCy);

    hue = Math.round(newCx);
    saturation = Math.round(100-(newCy/2));
    updateColours();
  }
}

function initColourPickerL() {

  var svgOffset = $("#colour-picker-l").offset();
  var svgTop = svgOffset.top;
  var svgLeft = svgOffset.left;

  var startHeight = 40;
  var startWidth = 361;

  var actualHeight = $("#colour-picker-l").height();
  var actualWidth = $("#colour-picker-l").width();

  var scaleHeight = actualHeight / startHeight;
  var scaleWidth = actualWidth / startWidth;

  var selectorCircle = $("#colour-picker-selector-l");
  var colourPickerL = $("#colour-picker-l");

  var mousedown = false;

  colourPickerL.on("mousemove", function(e) {
    if (mousedown === false) {
      return;
    }
    updateColour(e);
  });

  colourPickerL.on("mousedown", function(e) {
    mousedown = true;
    colourPickerL.css("cursor", "pointer");
    updateColour(e);
  });

  $(document).on("mouseup", function() {
    mousedown = false;
    colourPickerL.css("cursor", "initial");
  });

  function updateColour(e) {
    var newCx = (e.pageX - svgLeft)/scaleWidth;
    selectorCircle.attr("cx", newCx);

    lightness = Math.round(100 - (newCx)/3.61);
    updateColours();
  }
}

function updateColours() {
  // if passed string (only done when initialising) then uses that, otherwise will pull from set values
  // uses ternary operator, and that a string is only "truthy" if it's not blank / undefined / ....
  var newColour = `hsl(${hue},${saturation}%,${lightness}%)`;

  $("#colour-picker-panel").attr('fill', newColour);
  $("#" + currentId).css('background-color', newColour);
  colours[currentColour] = newColour;

  updateTextToCopy();
}

function setCircles() {

  var startColour = colours[currentColour];
  var reg = /hsl\((\d+),(\d+)%,(\d+)%\)/g;
  var regexResult = reg.exec(startColour);

  hue = regexResult[1];
  saturation = regexResult[2];
  lightness = regexResult[3];

  var selectorCircleHs = $("#colour-picker-selector-h-s");
  var selectorCircleL = $("#colour-picker-selector-l");

  var newHsCx = hue;
  var newHsCy = (100 - saturation) * 2;
  var newLCx = (100 - lightness) * 3.61;

  selectorCircleHs.attr("cx", newHsCx).attr("cy", newHsCy);
  selectorCircleL.attr("cx", newLCx);

  updateColours();

}

function showColourPicker() {
  // initialise both selection boxes
  // re-calculates variables and attaches event listeners
  initColourPickerHs();
  initColourPickerL();

  // puts hue/saturation and lightness circles in correct location for selected colour
  setCircles();

  // show (unhide) the picker
  $("#colour-picker").removeClass("hidden-2");
}

function hideColourPicker() {
  // makes sure the event listeners don't start stacking
  $("#colour-picker-h-s").off();
  $("#colour-picker-l").off();

  // if hiding via exit button, this makes sure picker reappears when clicking any of the colours
  $(".colour").removeClass("selecting");

  // hide the picker
  $("#colour-picker").addClass("hidden-2");
}

// set location for colour picker
$(document).ready(function() {
  updateWidths();
});

$(window).resize(function() {
  updateWidths();
});

function updateWidths() {
  windowWidth = $(window).width();
  colourPickerWidth = windowWidth > 750 ? 280 : 220;
}
