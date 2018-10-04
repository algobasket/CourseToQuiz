var $input = $(
  '<div class="modal-body"><input type="text" class="form-control" placeholder="Message"></div>'
);

$(document).on("click", ".js-msgGroup", function() {
  $(".js-msgGroup, .js-newMsg").addClass("d-none");
  $(".js-conversation").removeClass("d-none");
  $(".modal-title").html('<a href="#" class="js-gotoMsgs">Back</a>');
  $input.insertBefore(".js-modalBody");
});

$(function() {
  function getRight() {
    if (!$('[data-toggle="popover"]').length) return 0;
    return (
      $(window).width() -
      ($('[data-toggle="popover"]').offset().left +
        $('[data-toggle="popover"]').outerWidth())
    );
  }

  $(window).on("resize", function() {
    var instance = $('[data-toggle="popover"]').data("bs.popover");
    if (instance) {
      instance.config.viewport.padding = getRight();
    }
  });

  $('[data-toggle="popover"]').popover({
    template:
      '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-body popover-content px-0"></div></div>',
    title: "",
    html: true,
    trigger: "manual",
    placement: "bottom",
    viewport: {
      selector: "body",
      padding: getRight()
    },
    content: function() {
      var $nav = $("#js-popoverContent").clone();
      return (
        '<ul class="nav nav-pills nav-stacked flex-column" style="width: 120px">' +
        $nav.html() +
        "</ul>"
      );
    }
  });

  $('[data-toggle="popover"]').on("click", function(e) {
    e.stopPropagation();

    if (
      $(
        $('[data-toggle="popover"]')
          .data("bs.popover")
          .getTipElement()
      ).hasClass("in")
    ) {
      $('[data-toggle="popover"]').popover("hide");
      $(document).off("click.app.popover");
    } else {
      $('[data-toggle="popover"]').popover("show");

      setTimeout(function() {
        $(document).one("click.app.popover", function() {
          $('[data-toggle="popover"]').popover("hide");
        });
      }, 1);
    }
  });
});

$(document).on("click", ".js-gotoMsgs", function() {
  $input.remove();
  $(".js-conversation").addClass("d-none");
  $(".js-msgGroup, .js-newMsg").removeClass("d-none");
  $(".modal-title").html("Messages");
});

$(document).on("click", "[data-action=growl]", function(e) {
  e.preventDefault();

  $("#app-growl").append(
    '<div class="alert alert-dark alert-dismissible fade show" role="alert">' +
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
      '<span aria-hidden="true">×</span>' +
      "</button>" +
      "Click the x on the upper right to dismiss this little thing. Or click growl again to show more growls" +
      "</div>"
  );
});

$(document).on("focus", '[data-action="grow"]', function() {
  if ($(window).width() > 1000) {
    $(this).animate({
      width: 300
    });
  }
});

$(document).on("blur", '[data-action="grow"]', function() {
  if ($(window).width() > 1000) {
    var $this = $(this).animate({
      width: 180
    });
  }
});

// back to top button - docs
$(function() {
  if ($(".docs-top").length) {
    _backToTopButton();
    $(window).on("scroll", _backToTopButton);
    function _backToTopButton() {
      if ($(window).scrollTop() > $(window).height()) {
        $(".docs-top").fadeIn();
      } else {
        $(".docs-top").fadeOut();
      }
    }
  }
});

$(function() {
  // doc nav js
  var $toc = $("#markdown-toc");
  $("#markdown-toc li").addClass("nav-item");
  $("#markdown-toc li > a").addClass("nav-link");
  $("#markdown-toc li > ul").addClass("nav");
  var $window = $(window);

  if ($toc[0]) {
    maybeActivateDocNavigation();
    $window.on("resize", maybeActivateDocNavigation);

    function maybeActivateDocNavigation() {
      if ($window.width() > 768) {
        activateDocNavigation();
      } else {
        deactivateDocNavigation();
      }
    }

    function deactivateDocNavigation() {
      $window.off("resize.theme.nav");
      $window.off("scroll.theme.nav");
      $toc.css({
        position: "",
        left: "",
        top: ""
      });
    }

    function activateDocNavigation() {
      var cache = {};

      function updateCache() {
        cache.containerTop = $(".docs-content").offset().top - 40;
        cache.containerRight =
          $(".docs-content").offset().left + $(".docs-content").width() + 45;
        measure();
      }

      function measure() {
        var scrollTop = $window.scrollTop();
        var distance = Math.max(scrollTop - cache.containerTop, 0);

        if (!distance) {
          $($toc.find("li a")[1]).addClass("active");
          return $toc.css({
            position: "",
            left: "",
            top: ""
          });
        }

        $toc.css({
          position: "fixed",
          left: cache.containerRight,
          top: 40
        });
      }

      updateCache();

      $(window)
        .on("resize.theme.nav", updateCache)
        .on("scroll.theme.nav", measure);

      $("body").scrollspy({
        target: "#markdown-toc"
      });

      setTimeout(function() {
        $("body").scrollspy("refresh");
      }, 1000);
    }
  }
});

// Force username field to be lower case
function forceLower(strInput) {
  strInput.value = strInput.value.toLowerCase();
}

// dueDate no less than 6 days
$("#f").submit(function(e) {
  var $date = $("#dueDate"),
    date = new Date($date.val()),
    date2 = new Date();

  date2.setDate(date2.getDate() + 6);

  if (date < date2) {
    alert("Due Date: Minimum 6 days ahead! ");
    e.preventDefault();
  }
});

$(function() {
  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on("change", ":file", function() {
    var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input
        .val()
        .replace(/\\/g, "/")
        .replace(/.*\//, "");
    input.trigger("fileselect", [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready(function() {
    $(":file").on("fileselect", function(event, numFiles, label) {
      var input = $(this)
          .parents(".input-group")
          .find(":text"),
        log = numFiles > 1 ? numFiles + " files selected" : label;

      if (input.length) {
        input.val(log);
      }
    });
  });
});

// Password Validation

var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
};

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
};

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if (myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if (myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if (myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if (myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
};
