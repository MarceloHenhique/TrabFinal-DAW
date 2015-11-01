app.directive("cpfValidator", function () {
  var cpfValidator = (function () {
    return {
      require: "ngModel",
      link: function (scope, elm , attrs, ctrl) {
        ctrl.$validators.cpfValidator = function (modelValue, viewValue) {
          var the_cpf = viewValue;

          if (viewValue === undefined || the_cpf.length != 11)
            return false;

          var forValidate = the_cpf.substring(9, 11);

          function calcDigit(_from) {
              // first step
              var sum = 0;

              for (var fat = _from; fat >= 2; fat--)
                sum += parseInt(the_cpf[_from - fat])*fat;

              // second step
              var digit = (sum*10)%11;

              if (digit == 10)
                digit = 0;

              return digit;
          }

          /* validate */
          if (calcDigit(10) != parseInt(forValidate[0]) || calcDigit(11) != parseInt(forValidate[1]))
            return false;

          return true;
        }
      }
    }
  })();

  return cpfValidator;
});
