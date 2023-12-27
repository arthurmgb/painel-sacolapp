//CPF
var options = {
    onKeyPress: function (cpf, e, field, options) {
      var masks = ["000.000.000-00"];
      $(field).mask(masks[0], options);
    },
  };
  
  $("#cpf-e").on("input", function () {
    var inputValue = $(this).val();
    var mask = "000.000.000-00";
    $(this).mask(mask, options);
  });
  
  //CELULAR
  var optionsC = {
    onKeyPress: function (cpf, e, field, options) {
      var masks = ["(00) 00000-0000"];
      $(field).mask(masks[0], options);
    },
  };
  
  $("#celular-e").on("input", function () {
    var inputValue = $(this).val();
    var mask = "(00) 00000-0000";
    $(this).mask(mask, optionsC);
  });
  
  //TELEFONE
  var optionsT = {
    onKeyPress: function (cpf, e, field, options) {
      var masks = ["(00) 00000-0000"];
      $(field).mask(masks[0], options);
    },
  };
  
  $("#telefone-e").on("input", function () {
    var inputValue = $(this).val();
    var mask = "(00) 00000-0000";
    $(this).mask(mask, optionsT);
  });
  