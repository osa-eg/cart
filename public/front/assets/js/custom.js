
function openSearch() {
  document.getElementById("search-overlay").style.display = "block";
}

function closeSearch() {
  document.getElementById("search-overlay").style.display = "none";
}


$('#vPlus').on('click', function () {
  var $qty = $('#qtyInput');
  var currentVal = parseInt($qty.val(), 10);
  var $max =  $(this).data('max');

  if(currentVal >= parseInt($max)) {
    $qty.val(parseInt($max));
    $('#maxQuntity').show();
  }

  if (!isNaN(currentVal) && currentVal < parseInt($max) ) {
    var n = currentVal + 1;
    $qty.val(n);
  }
});
$('#vMinus').on('click', function () {
  var $qty = $('.qty-box .input-number');
  var currentVal = parseInt($qty.val(), 10);
  $('#maxQuntity').hide();
  var $max =  $('#vPlus').data('max');
  if(currentVal >= parseInt($max)) {
    currentVal = parseInt($max);
  }

  if (!isNaN(currentVal) && currentVal > 1) {
    $qty.val(currentVal - 1);
  }
});