jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
    var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

    btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
        var newVal = oldValue;
    } else {
        var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
    });

    btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
        var newVal = oldValue;
    } else {
        var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
    });
    
    input.on('keyup', function() {
        if (this.value > parseInt(max)) {
            alert('Wartość wyszukiwanego pytania nie może być większa niż '+max+'!')
            this.value = max;
        }
        else if (this.value < parseInt(min)) {
            if (this.value != "") {
                alert('Wartość wyszukiwanego pytania nie może być mniejsza niż '+min+'!')
                this.value = min;
            }
        }
    });

    input.on('keydown', function(e) {
        if (e.which != 8 && e.which != 0 && e.which < 48 || e.which > 57)
        {
            e.preventDefault();
        }
    });
});