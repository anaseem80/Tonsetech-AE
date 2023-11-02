$(document).ready(function () {
  var options = jQuery("#A1");
  options.change(function () {
    if ($(this).val() == "Yes") {
      $("#2").show();
    } else $(".invisible").hide(); // hide div if value is not "custom"
    // <!-- else $('#q2,#q3,#q4,#q5,#q6,#q7,#q8,#q9,#q10,#q11,#q12,#q13,#q14,#q15,#q16,#q17,#q18,#q19,#q20,#q21,#q22,#q23').hide(); // hide div if value is not "custom"-->
  });
});

$(document).ready(function () {
  var options = jQuery("#A2");
  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#3").show();
    } else hideall(3);
    // hide div if value is not "custom"
  });
});

$(document).ready(function () {
  var options = jQuery("#A3");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#4").show();
    } else hideall(4); // hide div if value is not "custom"
  });
});

$(document).ready(function () {
  var options = jQuery("#A4");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#5").show();
    } else hideall(5);
  });
});

$(document).ready(function () {
  var options = jQuery("#A5");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#6").show();
    } else hideall(6);
  });
});

$(document).ready(function () {
  var options = jQuery("#A6");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#7").show();
    } else hideall(7);
  });
});

$(document).ready(function () {
  var options = jQuery("#A7");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#8").show();
    } else hideall(8);
  });
});

$(document).ready(function () {
  var options = jQuery("#A8");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#9").show();
    } else hideall(9);
  });
});

$(document).ready(function () {
  var options = jQuery("#A9");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#10").show();
    } else hideall(10);
  });
});

$(document).ready(function () {
  var options = jQuery("#A10");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#11").show();
    } else hideall(11);
  });
});

$(document).ready(function () {
  var options = jQuery("#A11");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#12").show();
    } else hideall(12);
  });
});

$(document).ready(function () {
  var options = jQuery("#A12");

  options.change(function () {
    if ($(this).val() !== "") {
      $("#13").show();
    } else hideall(13);
  });
});

$(document).ready(function () {
  var options = jQuery("#A13");

  options.change(function () {
    if ($(this).val() !== "") {
      $("#14").show();
    } else {
      hideall(14);
      alert("Please fill the required field."); // hide div if value is not "custom"
    }
  });
});

$(document).ready(function () {
  var options = jQuery("#A14");

  options.change(function () {
    if ($(this).val() !== "") {
      $("#15").show();
    } else {
      hideall(15);
      alert("Please fill the required field."); // hide div if value is not "custom"
    }
  });
});

$(document).ready(function () {
  var options = jQuery("#A15");

  options.change(function () {
    if ($(this).val() !== "") {
      $("#16").show();
    } else {
      hideall(16);
      alert("Please fill the required field."); // hide div if value is not "custom"
    }
  });
});

$(document).ready(function () {
  var options = jQuery("#A16");
  options.change(function () {
    if ($(this).val() !== "") {
      $("#17").show();
    } else {
      hideall(17);
      alert("Please fill the required field."); // hide div if value is not "custom"
    }
  });
});

$(document).ready(function () {
  var options = jQuery("#A17");

  options.change(function () {
    if ($(this).val() !== "") {
      var valueemail = $("#A17").val();
      var emailRegex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

      if (emailRegex.test(valueemail)) {
        $("#18").show();
        //alert("Great, you entered a correct E-Mail-address");
      } else {
        hideall(18);
        alert("Invalid Email");
      }
    } else {
      hideall(18);
      alert("Please fill the required field."); // hide div if value is not "custom"
    }
  });
});

$(document).ready(function () {
  var options = jQuery("#countrycode");

  options.change(function () {
    if ($(this).val() !== "") {
      // $("#19").show();
      var valueecc = $("#countrycode").val();
      var ccRegex = /^(\+?\d{1,3}|\d{1,4})$/i;

      if (ccRegex.test(valueecc)) {
        $("#19").show();
        //alert("Great, you entered a correct country code");
      } else {
        hideall(19);
        alert("Invalid Country Code");
      }
    } else {
      hideall(19);
      alert("Please Provide Country Code."); // hide div if value is not "custom"
    }
  });
});

$(document).ready(function () {
  var options = jQuery("#phone");

  options.change(function () {
    if ($(this).val() !== "") {
      var valueeph = $("#phone").val();
      var phRegex = /^[0-9]{10}$/i;

      if (phRegex.test(valueeph)) {
        var valueecc = $("#countrycode").val();
        var ccRegex = /^(\+?\d{1,3}|\d{1,4})$/i;

        if (ccRegex.test(valueecc)) {
          $("#19").show();
          //alert("Great, you entered a correct country code and phone number");
        } else {
          hideall(19);
          alert("Invalid Country Code");
        }
        // $("#19").show();
        // alert("Great, you entered a correct phone number");
      } else {
        hideall(19);
        alert("Invalid Phone Number");
      }
    } else {
      hideall(19);
      alert("Please Provide 10 Digit Phone Number."); // hide div if value is not "custom"
    }
  });
});



$(document).ready(function () {
  var options = jQuery("#A19");

  //check if the next element is visible, if yes, check ph and cc
if($("#A19").is(":visible"))
{
  var valueecc = $("#countrycode").val();
  var ccRegex = /^(\+?\d{1,3}|\d{1,4})$/i;

  var valueeph = $("#phone").val();
  var phRegex = /^[0-9]{10}$/i;

  if (ccRegex.test(valueecc)) {
    if (phRegex.test(valueeph)) {
      $("#19").show();
      //alert("Great, you entered a correct country code");
    } 
    else{
      hideall(19);
      alert("Invalid Phone Number");
    }
    //$("#19").show();
    //alert("Great, you entered a correct country code");
  } else {
    hideall(19);
    alert("Invalid Country Code");
  }
}
 

 
 
  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#20").show();
    } else {
      hideall(20);
      alert("Please fill the required field."); // hide div if value is not "custom"
    }
  });
});

// $(document).ready(function () {
//   var options = jQuery("#A181");

//   options.change(function () {
//     if ($(this).val() !== "") {
//       $("#19").show();
//     } else {
//       hideall(19);
//       alert("Please fill the required field."); // hide div if value is not "custom"
//     }
//   });
// });

$(document).ready(function () {
  var options = jQuery("#A20");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#21").show();
    } else hideall(21); // hide div if value is not "custom"
  });
});

$(document).ready(function () {
  var options = jQuery("#A21");

  options.change(function () {
    if ($(this).val() !== "--Select--") {
      $("#22").show();
    } else hideall(22); // hide div if value is not "custom"
  });
});

$(document).ready(function () {
  // var options = jQuery("#A22");
  // options.change(function () {
  //   if ($(this).val() !== "--Select--") {
  //     $("#23").show();
  //   } else hideall(23); // hide div if value is not "custom"
  // });
});

function hideall(int) {
  var i = int;
  // alert(i);
  for (i = int; i < 22; i++) {
    $("option:selected", "#" + i + "").prop("selected", false);
    $("#" + i + "").hide();
  }
}
