/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {


  function changeLogo() {
    var getLogo = $('#logo').text(); // get logo text

    getLogo = getLogo.split(""); // split logo text into an array

    var output = ''; // resulting string 

    $.each(getLogo, function(index, val) {
       val = val.toUpperCase();
       if ((val != ' ') && (val != '-')) { // if it's true char is not ' ' AND is true char is not '-', do following
          output += '<div class="char letter-'+val+' char-no-'+ index + '">'+val+'</div>';
       } // end remove ' ' and '-' if  

       if (([index] == 9) || ([index] == 19)) { // add breaks for 9 x 3 grid
         output += '<br>';
       } // end <br> if
    });

    $('#logo').html(output); // replaces the original html with the output of the loop

  } /* END changeLogo() function */

  function shortenName() {
    // gets name from input, removes whitespace, gets the length
    // gets the first and last chars outputs it
    var yourName = $('input#inputYourName');
    var nameForm = $('#nameTarget');
    var output = $('.yourShortName');
    var response = $('.myResponse');
    var responseText = '';

    nameForm.on('submit', function(event) {
      event.preventDefault();
      var name = yourName.val();
      name = name.replace(/ /g,''); // http://stackoverflow.com/questions/6623231/remove-all-white-spaces-from-text
      name = name.toLowerCase();
      var nameLength = name.length;
      var middleNumber = nameLength-2; 
      var firstLetter = name.slice(0,1); // http://api.jquery.com/slice/
      var lastLetter = name.slice(nameLength-1,nameLength);
      if (nameLength > 2) { // if input is not blank or nonsense
          if (nameLength <= 12) {
            responseText = 'You have a nice short name!';
          } else {
            responseText = 'You have a long name too!'
          }
          // http://stackoverflow.com/questions/7717099/how-to-change-lowercase-chars-to-uppercase-using-the-keyup-event 
          output.text(firstLetter+middleNumber+lastLetter); // outputs short name
          response.removeClass('no-input none');
          output.addClass('yourShortName');
          output.removeClass('none');
      } else { // input is blank, castigate and wipe any prev short name output
          responseText = 'Hey blanky... write your name';
          response.addClass('no-input');
          response.removeClass('none');
          output.removeClass('yourShortName');
          output.text('');
      }
      response.html(responseText); // this always runs
    });

  } /*END shortenName*/

  if ($('body').hasClass('home')) { // only do this on front page
    changeLogo();
    shortenName();
  }


  /*
    START remove annoying whitespace in tags
  */

  function removeWhitespace(el) { // made it a function just to see if i could

      $.each(el,function() { // loops each el
        var word = $(this).text(); // $this gets the text of the current el
        var trimmed = $.trim(word); // trims it
        $(this).text(trimmed); // the text of the current el is replaced with trimmed one
      });

  }
  var tags = $('span.tag-item'); // gets each span tag
  removeWhitespace(tags);

  /*
    END remove annoying whitespace in tags
  */

  /*
     START single-post
  */

  if ($('body').hasClass('single-post')) { // only do this one single-post pages
    // clone tags, paste before heading, remove original tags
    var tags = $('.tags');
    var clonedTags = tags.clone();
    tags.remove();
    var heading = $('h2').eq(0);
    heading.before(clonedTags); // put tags before heading
  }

  // END replace logo TMSP text with post-title text


}); /* end of as page load scripts */
